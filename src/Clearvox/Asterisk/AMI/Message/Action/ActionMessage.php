<?php
namespace Clearvox\Asterisk\AMI\Message\Action;

use Clearvox\Asterisk\AMI\Message\OutgoingMessage;

abstract class ActionMessage extends OutgoingMessage
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
}