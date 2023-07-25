<?php
namespace Clearvox\Asterisk\AMI\Message\Response;

use Clearvox\Asterisk\AMI\Message\IncomingMessage;

class ResponseMessage extends IncomingMessage
{
    public function isSuccessful(): bool
    {
        return !str_contains($this->getKey('Response'), 'Error');
    }

    public function getMessage(): bool|string
    {
        return $this->getKey('Message');
    }
}