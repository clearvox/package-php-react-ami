<?php
namespace Clearvox\Asterisk\AMI\Message;

/**
 * All Messages, Incoming and Outgoing, are classes of this larger abstract
 * class. From here you can determine each part of the message like its
 * variables or keys.
 *
 * Constants are available for easily setting the EOL of EOM.
 *
 * @category Clearvox
 * @package AMI
 * @subpackage Message
 * @author Leon Rowland <leon@rowland.nl>
 */
abstract class Message
{
    /**
     * The End of the Line specification
     */
    const EOL = "\r\n";

    /**
     * The End of the Message specification
     */
    const EOM = "\r\n\r\n";

    /**
     * @var array
     */
    protected $keys = array();

    /**
     * @var array
     */
    protected $variables = array();

    /**
     * Get all Keys for this message.
     *
     * @return array
     */
    public function getKeys()
    {
        return $this->keys;
    }

    /**
     * Get a specific key from this Message if it has it
     *
     * @param string $key
     * @return string|bool
     */
    public function getKey($key)
    {
        return (array_key_exists($key, $this->keys) ? $this->keys[$key] : false);
    }

    /**
     * Set a value to a specific key for this message.
     *
     * @param string $key
     * @param string $value
     * @return $this
     */
    public function setKey($key, $value)
    {
        $this->keys[$key] = $value;
        return $this;
    }

    /**
     * Get all the variables from the message. They come in
     * this format: Variable: $variable=$value
     * @return array
     */
    public function getVariables()
    {
        return $this->variables;
    }

    /**
     * Get a specific variable if set, else return false.
     *
     * @param string $variable
     * @return string|bool
     */
    public function getVariable($variable)
    {
        return (array_key_exists($variable, $this->variables) ? $this->variables[$variable] : false);
    }

    /**
     * Set a variable for this Message.
     *
     * @param string $variable
     * @param string $value
     * @return $this
     */
    public function setVariable($variable, $value)
    {
        $this->variables[$variable] = $value;
        return $this;
    }
}