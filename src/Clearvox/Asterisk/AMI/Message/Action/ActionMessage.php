<?php
namespace Clearvox\Asterisk\AMI\Message\Action;

use Clearvox\Asterisk\AMI\Message\OutgoingMessage;
use Illuminate\Support\Contracts\ArrayableInterface;
use Illuminate\Support\Contracts\JsonableInterface;

abstract class ActionMessage extends OutgoingMessage implements JsonableInterface, ArrayableInterface
{
    public function __construct($action)
    {
        $this->setKey('Action', $action);
        $this->setKey('ActionID', microtime());
    }

    public function setActionID($actionID)
    {
        $matches = array();

        preg_match('/([A-Za-z0-9-_]{1,69})/', $actionID, $matches);

        if (empty($matches[0])) {
        }

        $this->setKey('ActionID', $matches[0]);
    }

    public function getActionID()
    {
        return $this->getKey('ActionID');
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        $actionData = $this->keys;
        $action     = $actionData['Action'];

        unset($actionData['Action']);
        unset($actionData['ActionID']);

        return array(
            'action' => $action,
            'data'   => $actionData
        );
    }

    /**
     * Convert the object to its JSON representation.
     *
     * @param  int $options
     * @return string
     */
    public function toJson($options = 0)
    {
        return json_encode($this->toArray(), $options);
    }


}