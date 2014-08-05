<?php
namespace Clearvox\Asterisk\AMI\Message\Action;

class LoginAction extends ActionMessage
{
    public function __construct($username, $password)
    {
        parent::__construct('Login');
        $this->setKey('Username', $username);
        $this->setKey('Secret', $password);
    }
}