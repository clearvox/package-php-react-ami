<?php
namespace Clearvox\Asterisk\AMI;

use Clearvox\Asterisk\AMI\Message\Action\ActionMessage;
use Evenement\EventEmitter;
use React\Promise\Deferred;
use React\Stream\Stream;

/**
 * Holds the connected AMI Stream and has the Process class to
 * handle the incoming stream messages.
 *
 * @category Clearvox
 * @package Asterisk
 * @subpackage AMI
 * @author Leon Rowland <leon@rowland.nl>
 */
class Manager extends EventEmitter
{
    /**
     * @var \React\Stream\Stream
     */
    protected $stream;

    /**
     * @var Process
     */
    protected $process;

    /**
     * @var array
     */
    protected $actions = array();

    public function __construct(Stream $stream, Process $process)
    {
        $this->stream  = $stream;
        $this->process = $process;

        $that = $this;

        $this->stream->on('data', function ($part) use ($process, $that) {
            $messages = $process->read($part);

            foreach ($messages as $message) {
                $process->run($that, $message);
            }
        });
    }

    /**
     * Sends a new ActionMessage and returns a promise.
     * The ActionID of the ActionMessage is used a reference for that
     * promise inside this class.
     *
     * @param ActionMessage $actionMessage
     * @return \React\Promise\Promise
     */
    public function send(ActionMessage $actionMessage)
    {
        $deferred = new Deferred();

        $this->stream->write($actionMessage->toString());
        $this->actions[$actionMessage->getActionID()] = $deferred;

        return $deferred->promise();
    }

    /**
     * Get all the actions currently stored with this Manager.
     * @return array | action id => Promise
     */
    public function getActions()
    {
        return $this->actions;
    }

}