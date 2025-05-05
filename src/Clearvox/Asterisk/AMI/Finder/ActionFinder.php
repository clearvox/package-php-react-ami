<?php
namespace Clearvox\Asterisk\AMI\Finder;

use ReflectionClass;
use ReflectionException;

class ActionFinder
{
    protected $actions = array(
        "AGI"                => "Clearvox\\Asterisk\\AMI\\Message\\Action\\AGIAction",
        "AbsoluteTimeout"    => "Clearvox\\Asterisk\\AMI\\Message\\Action\\AbsoluteTimeoutAction",
        "AgentLogoff"        => "Clearvox\\Asterisk\\AMI\\Message\\Action\\AgentLogoffAction",
        "Agents"             => "Clearvox\\Asterisk\\AMI\\Message\\Action\\AgentsAction",
        "AttendedTransfer"   => "Clearvox\\Asterisk\\AMI\\Message\\Action\\AttendedTransferAction",
        "Bridge"             => "Clearvox\\Asterisk\\AMI\\Message\\Action\\BridgeAction",
        "Challenge"          => "Clearvox\\Asterisk\\AMI\\Message\\Action\\ChallengeAction",
        "ChangeMonitor"      => "Clearvox\\Asterisk\\AMI\\Message\\Action\\ChangeMonitorAction",
        "Command"            => "Clearvox\\Asterisk\\AMI\\Message\\Action\\CommandAction",
        "ConfbridgeMute"     => "Clearvox\\Asterisk\\AMI\\Message\\Action\\ConfbridgeMuteAction",
        "ConfbridgeUnmute"   => "Clearvox\\Asterisk\\AMI\\Message\\Action\\ConfbridgeUnmuteAction",
        "CoreSettings"       => "Clearvox\\Asterisk\\AMI\\Message\\Action\\CoreSettingsAction",
        "CoreShowChannels"   => "Clearvox\\Asterisk\\AMI\\Message\\Action\\CoreShowChannelsAction",
        "CoreStatus"         => "Clearvox\\Asterisk\\AMI\\Message\\Action\\CoreStatusAction",
        "CreateConfig"       => "Clearvox\\Asterisk\\AMI\\Message\\Action\\CreateConfigAction",
        "DAHDIDNDOff"        => "Clearvox\\Asterisk\\AMI\\Message\\Action\\DAHDIDNDOffAction",
        "DAHDIDNDOn"         => "Clearvox\\Asterisk\\AMI\\Message\\Action\\DAHDIDNDOnAction",
        "DAHDIDialOffHook"   => "Clearvox\\Asterisk\\AMI\\Message\\Action\\DAHDIDialOffHookAction",
        "DAHDIHangup"        => "Clearvox\\Asterisk\\AMI\\Message\\Action\\DAHDIHangupAction",
        "DAHDIRestart"       => "Clearvox\\Asterisk\\AMI\\Message\\Action\\DAHDIRestartAction",
        "DAHDIShowChannels"  => "Clearvox\\Asterisk\\AMI\\Message\\Action\\DAHDIShowChannelsAction",
        "DAHDITransfer"      => "Clearvox\\Asterisk\\AMI\\Message\\Action\\DAHDITransferAction",
        "DBDel"              => "Clearvox\\Asterisk\\AMI\\Message\\Action\\DBDelAction",
        "DBDelTree"          => "Clearvox\\Asterisk\\AMI\\Message\\Action\\DBDelTreeAction",
        "DBGet"              => "Clearvox\\Asterisk\\AMI\\Message\\Action\\DBGetAction",
        "DBPut"              => "Clearvox\\Asterisk\\AMI\\Message\\Action\\DBPutAction",
        "DongleReload"       => "Clearvox\\Asterisk\\AMI\\Message\\Action\\DongleReloadAction",
        "DongleReset"        => "Clearvox\\Asterisk\\AMI\\Message\\Action\\DongleResetAction",
        "DongleRestart"      => "Clearvox\\Asterisk\\AMI\\Message\\Action\\DongleRestartAction",
        "DongleSendPDU"      => "Clearvox\\Asterisk\\AMI\\Message\\Action\\DongleSendPDUAction",
        "DongleSendSMS"      => "Clearvox\\Asterisk\\AMI\\Message\\Action\\DongleSendSMSAction",
        "DongleSendUSSD"     => "Clearvox\\Asterisk\\AMI\\Message\\Action\\DongleSendUSSDAction",
        "DongleShowDevices"  => "Clearvox\\Asterisk\\AMI\\Message\\Action\\DongleShowDevicesAction",
        "DongleStart"        => "Clearvox\\Asterisk\\AMI\\Message\\Action\\DongleStartAction",
        "DongleStop"         => "Clearvox\\Asterisk\\AMI\\Message\\Action\\DongleStopAction",
        "Events"             => "Clearvox\\Asterisk\\AMI\\Message\\Action\\EventsAction",
        "ExtensionState"     => "Clearvox\\Asterisk\\AMI\\Message\\Action\\ExtensionStateAction",
        "GetConfig"          => "Clearvox\\Asterisk\\AMI\\Message\\Action\\GetConfigAction",
        "GetConfigJSON"      => "Clearvox\\Asterisk\\AMI\\Message\\Action\\GetConfigJSONAction",
        "GetVar"             => "Clearvox\\Asterisk\\AMI\\Message\\Action\\GetVarAction",
        "Hangup"             => "Clearvox\\Asterisk\\AMI\\Message\\Action\\HangupAction",
        "JabberSend"         => "Clearvox\\Asterisk\\AMI\\Message\\Action\\JabberSendAction",
        "ListCategories"     => "Clearvox\\Asterisk\\AMI\\Message\\Action\\ListCategoriesAction",
        "ListCommands"       => "Clearvox\\Asterisk\\AMI\\Message\\Action\\ListCommandsAction",
        "LocalOptimizeAway"  => "Clearvox\\Asterisk\\AMI\\Message\\Action\\LocalOptimizeAwayAction",
        "Login"              => "Clearvox\\Asterisk\\AMI\\Message\\Action\\LoginAction",
        "Logoff"             => "Clearvox\\Asterisk\\AMI\\Message\\Action\\LogoffAction",
        "MailboxCount"       => "Clearvox\\Asterisk\\AMI\\Message\\Action\\MailboxCountAction",
        "MailboxStatus"      => "Clearvox\\Asterisk\\AMI\\Message\\Action\\MailboxStatusAction",
        "MeetmeList"         => "Clearvox\\Asterisk\\AMI\\Message\\Action\\MeetmeListAction",
        "MeetmeMute"         => "Clearvox\\Asterisk\\AMI\\Message\\Action\\MeetmeMuteAction",
        "MeetmeUnmute"       => "Clearvox\\Asterisk\\AMI\\Message\\Action\\MeetmeUnmuteAction",
        "MixMonitor"         => "Clearvox\\Asterisk\\AMI\\Message\\Action\\MixMonitorAction",
        "ModuleCheck"        => "Clearvox\\Asterisk\\AMI\\Message\\Action\\ModuleCheckAction",
        "ModuleLoad"         => "Clearvox\\Asterisk\\AMI\\Message\\Action\\ModuleLoadAction",
        "ModuleReload"       => "Clearvox\\Asterisk\\AMI\\Message\\Action\\ModuleReloadAction",
        "ModuleUnload"       => "Clearvox\\Asterisk\\AMI\\Message\\Action\\ModuleUnloadAction",
        "Monitor"            => "Clearvox\\Asterisk\\AMI\\Message\\Action\\MonitorAction",
        "Originate"          => "Clearvox\\Asterisk\\AMI\\Message\\Action\\OriginateAction",
        "Park"               => "Clearvox\\Asterisk\\AMI\\Message\\Action\\ParkAction",
        "ParkedCalls"        => "Clearvox\\Asterisk\\AMI\\Message\\Action\\ParkedCallsAction",
        "PauseMonitor"       => "Clearvox\\Asterisk\\AMI\\Message\\Action\\PauseMonitorAction",
        "Ping"               => "Clearvox\\Asterisk\\AMI\\Message\\Action\\PingAction",
        "PlayDTMF"           => "Clearvox\\Asterisk\\AMI\\Message\\Action\\PlayDTMFAction",
        "QueueAdd"           => "Clearvox\\Asterisk\\AMI\\Message\\Action\\QueueAddAction",
        "QueueLog"           => "Clearvox\\Asterisk\\AMI\\Message\\Action\\QueueLogAction",
        "QueuePause"         => "Clearvox\\Asterisk\\AMI\\Message\\Action\\QueuePauseAction",
        "QueuePenalty"       => "Clearvox\\Asterisk\\AMI\\Message\\Action\\QueuePenaltyAction",
        "QueueReload"        => "Clearvox\\Asterisk\\AMI\\Message\\Action\\QueueReloadAction",
        "QueueRemove"        => "Clearvox\\Asterisk\\AMI\\Message\\Action\\QueueRemoveAction",
        "QueueReset"         => "Clearvox\\Asterisk\\AMI\\Message\\Action\\QueueResetAction",
        "QueueRule"          => "Clearvox\\Asterisk\\AMI\\Message\\Action\\QueueRuleAction",
        "QueueStatus"        => "Clearvox\\Asterisk\\AMI\\Message\\Action\\QueueStatusAction",
        "QueueSummary"       => "Clearvox\\Asterisk\\AMI\\Message\\Action\\QueueSummaryAction",
        "QueueUnpause"       => "Clearvox\\Asterisk\\AMI\\Message\\Action\\QueueUnpauseAction",
        "Queues"             => "Clearvox\\Asterisk\\AMI\\Message\\Action\\QueuesAction",
        "Redirect"           => "Clearvox\\Asterisk\\AMI\\Message\\Action\\RedirectAction",
        "Reload"             => "Clearvox\\Asterisk\\AMI\\Message\\Action\\ReloadAction",
        "SIPNotify"          => "Clearvox\\Asterisk\\AMI\\Message\\Action\\SIPNotifyAction",
        "SIPPeers"           => "Clearvox\\Asterisk\\AMI\\Message\\Action\\SIPPeersAction",
        "SIPQualifyPeer"     => "Clearvox\\Asterisk\\AMI\\Message\\Action\\SIPQualifyPeerAction",
        "SIPShowPeer"        => "Clearvox\\Asterisk\\AMI\\Message\\Action\\SIPShowPeerAction",
        "SIPShowRegistry"    => "Clearvox\\Asterisk\\AMI\\Message\\Action\\SIPShowRegistryAction",
        "SendText"           => "Clearvox\\Asterisk\\AMI\\Message\\Action\\SendTextAction",
        "SetCDRUserField"    => "Clearvox\\Asterisk\\AMI\\Message\\Action\\SetCDRUserFieldAction",
        "SetVar"             => "Clearvox\\Asterisk\\AMI\\Message\\Action\\SetVarAction",
        "ShowDialPlan"       => "Clearvox\\Asterisk\\AMI\\Message\\Action\\ShowDialPlanAction",
        "Status"             => "Clearvox\\Asterisk\\AMI\\Message\\Action\\StatusAction",
        "StopMixMonitor"     => "Clearvox\\Asterisk\\AMI\\Message\\Action\\StopMixMonitorAction",
        "StopMonitor"        => "Clearvox\\Asterisk\\AMI\\Message\\Action\\StopMonitorAction",
        "UnpauseMonitor"     => "Clearvox\\Asterisk\\AMI\\Message\\Action\\UnpauseMonitorAction",
        "UpdateConfig"       => "Clearvox\\Asterisk\\AMI\\Message\\Action\\UpdateConfigAction",
        "UserEvent"          => "Clearvox\\Asterisk\\AMI\\Message\\Action\\UserEventAction",
        "VGSMSMSTx"          => "Clearvox\\Asterisk\\AMI\\Message\\Action\\VGSMSMSTxAction",
        "VoicemailUsersList" => "Clearvox\\Asterisk\\AMI\\Message\\Action\\VoicemailUsersListAction",
        "WaitEvent"          => "Clearvox\\Asterisk\\AMI\\Message\\Action\\WaitEventAction",
    );

    public function register($name, $class)
    {
        $this->actions[$name] = $class;
        return $this;
    }

    /**
     * @throws ReflectionException
     */
    public function find($name, $arguments = array())
    {
        if (array_key_exists($name, $this->actions)) {
            $instance = new ReflectionClass($this->actions[$name]);
            return $instance->newInstanceArgs($arguments);
        }
    }
}