<?php
namespace Clearvox\Asterisk\AMI\Finder;

class EventFinder
{
    protected $events = array(
        "AGIExecEvent.php"                    => "Clearvox\\Asterisk\\AMI\\Message\\Event\\AGIExecEvent.php",
        "AgentConnectEvent.php"               => "Clearvox\\Asterisk\\AMI\\Message\\Event\\AgentConnectEvent.php",
        "AgentloginEvent.php"                 => "Clearvox\\Asterisk\\AMI\\Message\\Event\\AgentloginEvent.php",
        "AgentlogoffEvent.php"                => "Clearvox\\Asterisk\\AMI\\Message\\Event\\AgentlogoffEvent.php",
        "AgentsCompleteEvent.php"             => "Clearvox\\Asterisk\\AMI\\Message\\Event\\AgentsCompleteEvent.php",
        "AgentsEvent.php"                     => "Clearvox\\Asterisk\\AMI\\Message\\Event\\AgentsEvent.php",
        "AsyncAGIEvent.php"                   => "Clearvox\\Asterisk\\AMI\\Message\\Event\\AsyncAGIEvent.php",
        "BridgeEvent.php"                     => "Clearvox\\Asterisk\\AMI\\Message\\Event\\BridgeEvent.php",
        "CELEvent.php"                        => "Clearvox\\Asterisk\\AMI\\Message\\Event\\CELEvent.php",
        "ChannelUpdateEvent.php"              => "Clearvox\\Asterisk\\AMI\\Message\\Event\\ChannelUpdateEvent.php",
        "CoreShowChannelEvent.php"            => "Clearvox\\Asterisk\\AMI\\Message\\Event\\CoreShowChannelEvent.php",
        "CoreShowChannelsCompleteEvent.php"   => "Clearvox\\Asterisk\\AMI\\Message\\Event\\CoreShowChannelsCompleteEvent.php",
        "DAHDIShowChannelsCompleteEvent.php"  => "Clearvox\\Asterisk\\AMI\\Message\\Event\\DAHDIShowChannelsCompleteEvent.php",
        "DAHDIShowChannelsEvent.php"          => "Clearvox\\Asterisk\\AMI\\Message\\Event\\DAHDIShowChannelsEvent.php",
        "DBGetResponseEvent.php"              => "Clearvox\\Asterisk\\AMI\\Message\\Event\\DBGetResponseEvent.php",
        "DTMFEvent.php"                       => "Clearvox\\Asterisk\\AMI\\Message\\Event\\DTMFEvent.php",
        "DialEvent.php"                       => "Clearvox\\Asterisk\\AMI\\Message\\Event\\DialEvent.php",
        "DongleDeviceEntryEvent.php"          => "Clearvox\\Asterisk\\AMI\\Message\\Event\\DongleDeviceEntryEvent.php",
        "DongleNewCUSDEvent.php"              => "Clearvox\\Asterisk\\AMI\\Message\\Event\\DongleNewCUSDEvent.php",
        "DongleNewUSSDBase64Event.php"        => "Clearvox\\Asterisk\\AMI\\Message\\Event\\DongleNewUSSDBase64Event.php",
        "DongleNewUSSDEvent.php"              => "Clearvox\\Asterisk\\AMI\\Message\\Event\\DongleNewUSSDEvent.php",
        "DongleSMSStatusEvent.php"            => "Clearvox\\Asterisk\\AMI\\Message\\Event\\DongleSMSStatusEvent.php",
        "DongleShowDevicesCompleteEvent.php"  => "Clearvox\\Asterisk\\AMI\\Message\\Event\\DongleShowDevicesCompleteEvent.php",
        "DongleStatusEvent.php"               => "Clearvox\\Asterisk\\AMI\\Message\\Event\\DongleStatusEvent.php",
        "DongleUSSDStatusEvent.php"           => "Clearvox\\Asterisk\\AMI\\Message\\Event\\DongleUSSDStatusEvent.php",
        "ExtensionStatusEvent.php"            => "Clearvox\\Asterisk\\AMI\\Message\\Event\\ExtensionStatusEvent.php",
        "FullyBootedEvent.php"                => "Clearvox\\Asterisk\\AMI\\Message\\Event\\FullyBootedEvent.php",
        "HangupEvent.php"                     => "Clearvox\\Asterisk\\AMI\\Message\\Event\\HangupEvent.php",
        "HoldEvent.php"                       => "Clearvox\\Asterisk\\AMI\\Message\\Event\\HoldEvent.php",
        "JabberEventEvent.php"                => "Clearvox\\Asterisk\\AMI\\Message\\Event\\JabberEventEvent.php",
        "JoinEvent.php"                       => "Clearvox\\Asterisk\\AMI\\Message\\Event\\JoinEvent.php",
        "LeaveEvent.php"                      => "Clearvox\\Asterisk\\AMI\\Message\\Event\\LeaveEvent.php",
        "LinkEvent.php"                       => "Clearvox\\Asterisk\\AMI\\Message\\Event\\LinkEvent.php",
        "ListDialplanEvent.php"               => "Clearvox\\Asterisk\\AMI\\Message\\Event\\ListDialplanEvent.php",
        "MasqueradeEvent.php"                 => "Clearvox\\Asterisk\\AMI\\Message\\Event\\MasqueradeEvent.php",
        "MessageWaitingEvent.php"             => "Clearvox\\Asterisk\\AMI\\Message\\Event\\MessageWaitingEvent.php",
        "MusicOnHoldEvent.php"                => "Clearvox\\Asterisk\\AMI\\Message\\Event\\MusicOnHoldEvent.php",
        "NewAccountCodeEvent.php"             => "Clearvox\\Asterisk\\AMI\\Message\\Event\\NewAccountCodeEvent.php",
        "NewCalleridEvent.php"                => "Clearvox\\Asterisk\\AMI\\Message\\Event\\NewCalleridEvent.php",
        "NewchannelEvent.php"                 => "Clearvox\\Asterisk\\AMI\\Message\\Event\\NewchannelEvent.php",
        "NewextenEvent.php"                   => "Clearvox\\Asterisk\\AMI\\Message\\Event\\NewextenEvent.php",
        "NewstateEvent.php"                   => "Clearvox\\Asterisk\\AMI\\Message\\Event\\NewstateEvent.php",
        "OriginateResponseEvent.php"          => "Clearvox\\Asterisk\\AMI\\Message\\Event\\OriginateResponseEvent.php",
        "ParkedCallEvent.php"                 => "Clearvox\\Asterisk\\AMI\\Message\\Event\\ParkedCallEvent.php",
        "ParkedCallsCompleteEvent.php"        => "Clearvox\\Asterisk\\AMI\\Message\\Event\\ParkedCallsCompleteEvent.php",
        "PeerEntryEvent.php"                  => "Clearvox\\Asterisk\\AMI\\Message\\Event\\PeerEntryEvent.php",
        "PeerStatusEvent.php"                 => "Clearvox\\Asterisk\\AMI\\Message\\Event\\PeerStatusEvent.php",
        "PeerlistCompleteEvent.php"           => "Clearvox\\Asterisk\\AMI\\Message\\Event\\PeerlistCompleteEvent.php",
        "QueueMemberAddedEvent.php"           => "Clearvox\\Asterisk\\AMI\\Message\\Event\\QueueMemberAddedEvent.php",
        "QueueMemberEvent.php"                => "Clearvox\\Asterisk\\AMI\\Message\\Event\\QueueMemberEvent.php",
        "QueueMemberPausedEvent.php"          => "Clearvox\\Asterisk\\AMI\\Message\\Event\\QueueMemberPausedEvent.php",
        "QueueMemberRemovedEvent.php"         => "Clearvox\\Asterisk\\AMI\\Message\\Event\\QueueMemberRemovedEvent.php",
        "QueueMemberStatusEvent.php"          => "Clearvox\\Asterisk\\AMI\\Message\\Event\\QueueMemberStatusEvent.php",
        "QueueParamsEvent.php"                => "Clearvox\\Asterisk\\AMI\\Message\\Event\\QueueParamsEvent.php",
        "QueueStatusCompleteEvent.php"        => "Clearvox\\Asterisk\\AMI\\Message\\Event\\QueueStatusCompleteEvent.php",
        "QueueSummaryCompleteEvent.php"       => "Clearvox\\Asterisk\\AMI\\Message\\Event\\QueueSummaryCompleteEvent.php",
        "QueueSummaryEvent.php"               => "Clearvox\\Asterisk\\AMI\\Message\\Event\\QueueSummaryEvent.php",
        "RTCPReceivedEvent.php"               => "Clearvox\\Asterisk\\AMI\\Message\\Event\\RTCPReceivedEvent.php",
        "RTCPReceiverStatEvent.php"           => "Clearvox\\Asterisk\\AMI\\Message\\Event\\RTCPReceiverStatEvent.php",
        "RTCPSentEvent.php"                   => "Clearvox\\Asterisk\\AMI\\Message\\Event\\RTCPSentEvent.php",
        "RTPReceiverStatEvent.php"            => "Clearvox\\Asterisk\\AMI\\Message\\Event\\RTPReceiverStatEvent.php",
        "RTPSenderStatEvent.php"              => "Clearvox\\Asterisk\\AMI\\Message\\Event\\RTPSenderStatEvent.php",
        "RegistrationsCompleteEvent.php"      => "Clearvox\\Asterisk\\AMI\\Message\\Event\\RegistrationsCompleteEvent.php",
        "RegistryEvent.php"                   => "Clearvox\\Asterisk\\AMI\\Message\\Event\\RegistryEvent.php",
        "RenameEvent.php"                     => "Clearvox\\Asterisk\\AMI\\Message\\Event\\RenameEvent.php",
        "ShowDialPlanCompleteEvent.php"       => "Clearvox\\Asterisk\\AMI\\Message\\Event\\ShowDialPlanCompleteEvent.php",
        "StatusCompleteEvent.php"             => "Clearvox\\Asterisk\\AMI\\Message\\Event\\StatusCompleteEvent.php",
        "StatusEvent.php"                     => "Clearvox\\Asterisk\\AMI\\Message\\Event\\StatusEvent.php",
        "TransferEvent.php"                   => "Clearvox\\Asterisk\\AMI\\Message\\Event\\TransferEvent.php",
        "UnParkedCallEvent.php"               => "Clearvox\\Asterisk\\AMI\\Message\\Event\\UnParkedCallEvent.php",
        "UnknownEvent.php"                    => "Clearvox\\Asterisk\\AMI\\Message\\Event\\UnknownEvent.php",
        "UnlinkEvent.php"                     => "Clearvox\\Asterisk\\AMI\\Message\\Event\\UnlinkEvent.php",
        "UserEventEvent.php"                  => "Clearvox\\Asterisk\\AMI\\Message\\Event\\UserEventEvent.php",
        "VarSetEvent.php"                     => "Clearvox\\Asterisk\\AMI\\Message\\Event\\VarSetEvent.php",
        "VoicemailUserEntryCompleteEvent.php" => "Clearvox\\Asterisk\\AMI\\Message\\Event\\VoicemailUserEntryCompleteEvent.php",
        "VoicemailUserEntryEvent.php"         => "Clearvox\\Asterisk\\AMI\\Message\\Event\\VoicemailUserEntryEvent.php",
        "vgsm_me_stateEvent.php"              => "Clearvox\\Asterisk\\AMI\\Message\\Event\\vgsm_me_stateEvent.php",
        "vgsm_net_stateEvent.php"             => "Clearvox\\Asterisk\\AMI\\Message\\Event\\vgsm_net_stateEvent.php",
        "vgsm_sms_rxEvent.php"                => "Clearvox\\Asterisk\\AMI\\Message\\Event\\vgsm_sms_rxEvent.php",
    );

    public function registerEvent($eventName, $class)
    {
        $this->events[$eventName] = $class;
    }

    public function find($eventName, $rawMessage)
    {
        if (array_key_exists($eventName, $this->events)) {
            return new $this->events[$eventName]($rawMessage);
        }
    }
}