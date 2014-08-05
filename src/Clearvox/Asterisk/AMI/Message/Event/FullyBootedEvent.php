<?php
namespace Clearvox\Asterisk\AMI\Message\Event;

class FullyBootedEvent extends EventMessage
{
    public function getPrivilege()
    {
        return $this->getKey('Privilege');
    }

    public function getStatus()
    {
        return $this->getKey('Status');
    }
}