<?php
namespace Clearvox\Asterisk\AMI\Message\Event;

use Clearvox\Asterisk\AMI\Message\IncomingMessage;

class EventMessage extends IncomingMessage
{
    public function getName()
    {
        return $this->getKey('Event');
    }
}