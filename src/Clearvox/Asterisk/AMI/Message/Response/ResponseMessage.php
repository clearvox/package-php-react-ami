<?php
namespace Clearvox\Asterisk\AMI\Message\Response;

use Clearvox\Asterisk\AMI\Message\IncomingMessage;

class ResponseMessage extends IncomingMessage
{
    public function isSuccessful()
    {
        return (bool) (false === strstr($this->getKey('Response'), 'Error'));
    }

    public function getMessage()
    {
        return $this->getKey('Message');
    }
}