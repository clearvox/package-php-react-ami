<?php
namespace Clearvox\Asterisk\AMI\Message;

/**
 * An OutgoingMessage is one that is going towards the AMI.
 * You can use this object as a string to get the full
 * required Message.
 *
 * @category Clearvox
 * @package Asterisk
 * @subpackage AMI\Message
 * @author Leon Rowland <leon@rowland.nl>
 */
class OutgoingMessage extends Message
{
    /**
     * Turn this OutgoingMessage into the full required
     * string.
     *
     * Including End of Lines and End of Message.
     *
     * @return string
     */
    public function toString()
    {
        $prepared = array();

        foreach ($this->keys as $key => $value) {
            $prepared[] = $key . ': ' . $value;
        }

        foreach ($this->variables as $variable => $value) {
            $prepared[] = "Variable: $variable=$value";
        }

        return implode(self::EOL, $prepared) . self::EOM;
    }

    public function __toString()
    {
        return $this->toString();
    }
}