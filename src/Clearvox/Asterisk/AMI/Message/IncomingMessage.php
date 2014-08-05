<?php
namespace Clearvox\Asterisk\AMI\Message;

class IncomingMessage extends Message
{
    public function __construct($rawMessage)
    {
        $lines = explode(self::EOL, $rawMessage);

        foreach ($lines as $line) {

            $content = explode(':', $line);

            $name = trim($content[0]);
            unset($content[0]);

            $value = '';
            if (isset($content[1])) {
                $value = trim(implode(':', $content));
            }

            $this->setKey($name, $value);
        }
    }
}