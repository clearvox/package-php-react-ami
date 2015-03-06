<?php
namespace Clearvox\Asterisk\AMI\Message\Action;

class UserEventAction extends ActionMessage
{
    public function __construct($name)
    {
        parent::__construct('UserEvent');
        $this->setKey('UserEvent', $name);
    }
}