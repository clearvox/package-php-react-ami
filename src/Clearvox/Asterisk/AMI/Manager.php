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
     * @var Stream
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

    public function __construct(Process $process)
    {
        $this->process = $process;
    }

    /**
     * Set the stream for the Manager instance.
     *
     * @param Stream $stream
     */
    public function setStream(Stream $stream)
    {
        $this->stream = $stream;

        $that    = $this;
        $process = $this->process;

        $this->stream->on(
            'data',
            function ($part) use ($process, $that) {
                $messages = $process->read($part);

                foreach ($messages as $message) {
                    $process->run($that, $message);
                }
            }
        );
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

    /**
     * Close the manager connection
     */
    public function close()
    {
        $this->stream->close();
    }
}
