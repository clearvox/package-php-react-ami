<?php
namespace Clearvox\Asterisk\AMI\Message\Action;

class CommandAction extends ActionMessage
{
    public function __construct($command)
    {
        parent::__construct('Command');
        $this->setKey('Command', $command);
    }
}