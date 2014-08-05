<?php
namespace Clearvox\Asterisk\AMI\Finder;

class EventFinder
{
    protected $events = array(
        "AGIExec"                    => "Clearvox\\Asterisk\\AMI\\Message\\Event\\AGIExecEvent",
        "AgentConnect"               => "Clearvox\\Asterisk\\AMI\\Message\\Event\\AgentConnectEvent",
        "Agentlogin"                 => "Clearvox\\Asterisk\\AMI\\Message\\Event\\AgentloginEvent",
        "Agentlogoff"                => "Clearvox\\Asterisk\\AMI\\Message\\Event\\AgentlogoffEvent",
        "AgentsComplete"             => "Clearvox\\Asterisk\\AMI\\Message\\Event\\AgentsCompleteEvent",
        "Agents"                     => "Clearvox\\Asterisk\\AMI\\Message\\Event\\AgentsEvent",
        "AsyncAGI"                   => "Clearvox\\Asterisk\\AMI\\Message\\Event\\AsyncAGIEvent",
        "Bridge"                     => "Clearvox\\Asterisk\\AMI\\Message\\Event\\BridgeEvent",
        "CEL"                        => "Clearvox\\Asterisk\\AMI\\Message\\Event\\CELEvent",
        "ChannelUpdate"              => "Clearvox\\Asterisk\\AMI\\Message\\Event\\ChannelUpdateEvent",
        "CoreShowChannel"            => "Clearvox\\Asterisk\\AMI\\Message\\Event\\CoreShowChannelEvent",
        "CoreShowChannelsComplete"   => "Clearvox\\Asterisk\\AMI\\Message\\Event\\CoreShowChannelsCompleteEvent",
        "DAHDIShowChannelsComplete"  => "Clearvox\\Asterisk\\AMI\\Message\\Event\\DAHDIShowChannelsCompleteEvent",
        "DAHDIShowChannels"          => "Clearvox\\Asterisk\\AMI\\Message\\Event\\DAHDIShowChannelsEvent",
        "DBGetResponse"              => "Clearvox\\Asterisk\\AMI\\Message\\Event\\DBGetResponseEvent",
        "DTMF"                       => "Clearvox\\Asterisk\\AMI\\Message\\Event\\DTMFEvent",
        "Dial"                       => "Clearvox\\Asterisk\\AMI\\Message\\Event\\DialEvent",
        "DongleDeviceEntry"          => "Clearvox\\Asterisk\\AMI\\Message\\Event\\DongleDeviceEntryEvent",
        "DongleNewCUSD"              => "Clearvox\\Asterisk\\AMI\\Message\\Event\\DongleNewCUSDEvent",
        "DongleNewUSSDBase64"        => "Clearvox\\Asterisk\\AMI\\Message\\Event\\DongleNewUSSDBase64Event",
        "DongleNewUSSD"              => "Clearvox\\Asterisk\\AMI\\Message\\Event\\DongleNewUSSDEvent",
        "DongleSMSStatus"            => "Clearvox\\Asterisk\\AMI\\Message\\Event\\DongleSMSStatusEvent",
        "DongleShowDevicesComplete"  => "Clearvox\\Asterisk\\AMI\\Message\\Event\\DongleShowDevicesCompleteEvent",
        "DongleStatus"               => "Clearvox\\Asterisk\\AMI\\Message\\Event\\DongleStatusEvent",
        "DongleUSSDStatus"           => "Clearvox\\Asterisk\\AMI\\Message\\Event\\DongleUSSDStatusEvent",
        "ExtensionStatus"            => "Clearvox\\Asterisk\\AMI\\Message\\Event\\ExtensionStatusEvent",
        "FullyBooted"                => "Clearvox\\Asterisk\\AMI\\Message\\Event\\FullyBootedEvent",
        "Hangup"                     => "Clearvox\\Asterisk\\AMI\\Message\\Event\\HangupEvent",
        "Hold"                       => "Clearvox\\Asterisk\\AMI\\Message\\Event\\HoldEvent",
        "JabberEvent"                => "Clearvox\\Asterisk\\AMI\\Message\\Event\\JabberEventEvent",
        "Join"                       => "Clearvox\\Asterisk\\AMI\\Message\\Event\\JoinEvent",
        "Leave"                      => "Clearvox\\Asterisk\\AMI\\Message\\Event\\LeaveEvent",
        "Link"                       => "Clearvox\\Asterisk\\AMI\\Message\\Event\\LinkEvent",
        "ListDialplan"               => "Clearvox\\Asterisk\\AMI\\Message\\Event\\ListDialplanEvent",
        "Masquerade"                 => "Clearvox\\Asterisk\\AMI\\Message\\Event\\MasqueradeEvent",
        "MessageWaiting"             => "Clearvox\\Asterisk\\AMI\\Message\\Event\\MessageWaitingEvent",
        "MusicOnHold"                => "Clearvox\\Asterisk\\AMI\\Message\\Event\\MusicOnHoldEvent",
        "NewAccountCode"             => "Clearvox\\Asterisk\\AMI\\Message\\Event\\NewAccountCodeEvent",
        "NewCallerid"                => "Clearvox\\Asterisk\\AMI\\Message\\Event\\NewCalleridEvent",
        "Newchannel"                 => "Clearvox\\Asterisk\\AMI\\Message\\Event\\NewchannelEvent",
        "Newexten"                   => "Clearvox\\Asterisk\\AMI\\Message\\Event\\NewextenEvent",
        "Newstate"                   => "Clearvox\\Asterisk\\AMI\\Message\\Event\\NewstateEvent",
        "OriginateResponse"          => "Clearvox\\Asterisk\\AMI\\Message\\Event\\OriginateResponseEvent",
        "ParkedCall"                 => "Clearvox\\Asterisk\\AMI\\Message\\Event\\ParkedCallEvent",
        "ParkedCallsComplete"        => "Clearvox\\Asterisk\\AMI\\Message\\Event\\ParkedCallsCompleteEvent",
        "PeerEntry"                  => "Clearvox\\Asterisk\\AMI\\Message\\Event\\PeerEntryEvent",
        "PeerStatus"                 => "Clearvox\\Asterisk\\AMI\\Message\\Event\\PeerStatusEvent",
        "PeerlistComplete"           => "Clearvox\\Asterisk\\AMI\\Message\\Event\\PeerlistCompleteEvent",
        "QueueMemberAdded"           => "Clearvox\\Asterisk\\AMI\\Message\\Event\\QueueMemberAddedEvent",
        "QueueMember"                => "Clearvox\\Asterisk\\AMI\\Message\\Event\\QueueMemberEvent",
        "QueueMemberPaused"          => "Clearvox\\Asterisk\\AMI\\Message\\Event\\QueueMemberPausedEvent",
        "QueueMemberRemoved"         => "Clearvox\\Asterisk\\AMI\\Message\\Event\\QueueMemberRemovedEvent",
        "QueueMemberStatus"          => "Clearvox\\Asterisk\\AMI\\Message\\Event\\QueueMemberStatusEvent",
        "QueueParams"                => "Clearvox\\Asterisk\\AMI\\Message\\Event\\QueueParamsEvent",
        "QueueStatusComplete"        => "Clearvox\\Asterisk\\AMI\\Message\\Event\\QueueStatusCompleteEvent",
        "QueueSummaryComplete"       => "Clearvox\\Asterisk\\AMI\\Message\\Event\\QueueSummaryCompleteEvent",
        "QueueSummary"               => "Clearvox\\Asterisk\\AMI\\Message\\Event\\QueueSummaryEvent",
        "RTCPReceived"               => "Clearvox\\Asterisk\\AMI\\Message\\Event\\RTCPReceivedEvent",
        "RTCPReceiverStat"           => "Clearvox\\Asterisk\\AMI\\Message\\Event\\RTCPReceiverStatEvent",
        "RTCPSent"                   => "Clearvox\\Asterisk\\AMI\\Message\\Event\\RTCPSentEvent",
        "RTPReceiverStat"            => "Clearvox\\Asterisk\\AMI\\Message\\Event\\RTPReceiverStatEvent",
        "RTPSenderStat"              => "Clearvox\\Asterisk\\AMI\\Message\\Event\\RTPSenderStatEvent",
        "RegistrationsComplete"      => "Clearvox\\Asterisk\\AMI\\Message\\Event\\RegistrationsCompleteEvent",
        "Registry"                   => "Clearvox\\Asterisk\\AMI\\Message\\Event\\RegistryEvent",
        "Rename"                     => "Clearvox\\Asterisk\\AMI\\Message\\Event\\RenameEvent",
        "ShowDialPlanComplete"       => "Clearvox\\Asterisk\\AMI\\Message\\Event\\ShowDialPlanCompleteEvent",
        "StatusComplete"             => "Clearvox\\Asterisk\\AMI\\Message\\Event\\StatusCompleteEvent",
        "Status"                     => "Clearvox\\Asterisk\\AMI\\Message\\Event\\StatusEvent",
        "Transfer"                   => "Clearvox\\Asterisk\\AMI\\Message\\Event\\TransferEvent",
        "UnParkedCall"               => "Clearvox\\Asterisk\\AMI\\Message\\Event\\UnParkedCallEvent",
        "Unknown"                    => "Clearvox\\Asterisk\\AMI\\Message\\Event\\UnknownEvent",
        "Unlink"                     => "Clearvox\\Asterisk\\AMI\\Message\\Event\\UnlinkEvent",
        "UserEvent"                  => "Clearvox\\Asterisk\\AMI\\Message\\Event\\UserEventEvent",
        "VarSet"                     => "Clearvox\\Asterisk\\AMI\\Message\\Event\\VarSetEvent",
        "VoicemailUserEntryComplete" => "Clearvox\\Asterisk\\AMI\\Message\\Event\\VoicemailUserEntryCompleteEvent",
        "VoicemailUserEntry"         => "Clearvox\\Asterisk\\AMI\\Message\\Event\\VoicemailUserEntryEvent",
        "vgsm_me_state"              => "Clearvox\\Asterisk\\AMI\\Message\\Event\\vgsm_me_stateEvent",
        "vgsm_net_state"             => "Clearvox\\Asterisk\\AMI\\Message\\Event\\vgsm_net_stateEvent",
        "vgsm_sms_rx"                => "Clearvox\\Asterisk\\AMI\\Message\\Event\\vgsm_sms_rxEvent",
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