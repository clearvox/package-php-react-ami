<?php
namespace Clearvox\Asterisk\AMI;

use Clearvox\Asterisk\AMI\Finder\EventFinder;
use Clearvox\Asterisk\AMI\Message\Message;
use Clearvox\Asterisk\AMI\Message\Response\ResponseMessage;

/**
 * Handles each tick of the main loop and will emit the correct
 * events and handle the send actions responses.
 *
 * @category Clearvox
 * @package Asterisk
 * @subpackage AMI
 * @author Leon Rowland <leon@rowland.nl>
 */
class Process
{
    /**
     * @var Finder\EventFinder
     */
    protected EventFinder $eventFinder;

    /**
     * @var string
     */
    protected string $buffer = '';

    public function __construct(
        EventFinder $eventFinder
    ) {
        $this->eventFinder = $eventFinder;
    }

    /**
     * Read part of the message coming in. Add that part to the buffer and
     * wait for the End of Message declaration.
     *
     * Add that message to the full messages array and return it.
     *
     * @param string $part
     * @return array
     */
    public function read(string $part): array
    {
        $messages = array();
        $this->buffer .= $part;

        while ($marker = strpos($this->buffer, Message::EOM)) {
            $msg          = substr($this->buffer, 0, $marker);
            $this->buffer = substr($this->buffer, $marker + strlen(Message::EOM));

            $messages[] = $msg;
        }

        return $messages;
    }

    /**
     * Run the full message from the stream. Determine if its an Event or a
     * Response.
     *
     * If an Event,use the EventFinder to get the correct class if the Manager
     * has been specified to listen on the event name.
     *
     * If a Response, get the ActionID from the response, if the Manager has
     * saved actions with that ActionID then tell that promise we are now
     * completed.
     *
     * @param Manager $manager
     * @param $message
     */
    public function run(Manager $manager, $message): void
    {
        $eventPosition    = strpos($message, 'Event:');
        $responsePosition = strpos($message, 'Response:');

        if (false !== $eventPosition) {
            $event = $this->determineEventName($eventPosition, $message);

            $listeners = $manager->listeners($event);

            if (!empty($listeners)) {
                $manager->emit($event, array($this->eventFinder->find($event, $message)));
            }
        }

        if (false !== $responsePosition) {
            $responseMessage  = new ResponseMessage($message);
            $responseActionID = $responseMessage->getKey('ActionID');

            $actions = $manager->getActions();

            if (array_key_exists($responseActionID, $actions)) {
                if ($responseMessage->isSuccessful()) {
                    $actions[$responseActionID]->resolve($responseMessage);
                } else {
                    $actions[$responseActionID]->reject($responseMessage);
                }
            }
        }
    }

    /**
     * Determine the event name from the full incoming message.
     *
     * @param int $eventPosition
     * @param string $message
     * @return string
     */
    protected function determineEventName(int $eventPosition, string $message): string
    {
        $eventNameStart = $eventPosition + 7;

        $eventNameEnd = strpos($message, Message::EOL, $eventNameStart);

        if (false === $eventNameEnd) {
            $eventNameEnd = strlen($message);
        }

        return substr($message, $eventNameStart, $eventNameEnd - $eventNameStart);
    }
}