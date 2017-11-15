<?php

namespace Clearvox\Asterisk\AMI\Message\Action;

/**
 * Blind Transfer action message.
 *
 * @category   Pami
 * @package    Message
 * @subpackage Action
 * @author     Stijn Buurman <stijnbuurman@gmail.com>
 */
class BlindTransferAction extends ActionMessage
{

    /**
     * Constructor.
     *
     * @param string $channel   Channel to transfer.
     * @param string $extension Extension to transfer to.
     * @param string $context   Context to transfer to.
     *
     * @return void
     */
    public function __construct($channel, $extension, $context)
    {
        parent::__construct('BlindTransfer');
        $this->setKey('Channel', $channel);
        $this->setKey('Exten', $extension);
        $this->setKey('Context', $context);
    }
}