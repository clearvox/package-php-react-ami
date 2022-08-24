<?php

namespace Clearvox\Asterisk\AMI\Message\Action;

class PJSIPNotify extends ActionMessage
{
    /**
     * Constructor.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct('PJSIPNotify');
    }
}