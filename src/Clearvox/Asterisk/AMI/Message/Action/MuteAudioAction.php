<?php
namespace Clearvox\Asterisk\AMI\Message\Action;

class MuteAudioAction extends ActionMessage
{
    const DIRECTION_IN = 'in';
    const DIRECTION_OUT = 'out';
    const DIRECTION_ALL = 'all';

    const STATE_ON = 'on';
    const STATE_OFF = 'off';

    public function __construct($channel, $direction, $state)
    {
        parent::__construct('MuteAudio');
        $this->setKey('Channel', $channel);
        $this->setKey('Direction', $direction);
        $this->setKey('State', $state);
    }
}