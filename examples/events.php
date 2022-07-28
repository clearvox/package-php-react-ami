<?php
use Clearvox\Asterisk\AMI\Finder\EventFinder;
use Clearvox\Asterisk\AMI\Message\Action\CommandAction;
use Clearvox\Asterisk\AMI\Message\Action\LoginAction;
use Clearvox\Asterisk\AMI\Message\Event\FullyBooted;
use Clearvox\Asterisk\AMI\Message\Event\FullyBootedEvent;
use Clearvox\Asterisk\AMI\Message\Response\ResponseMessage;
use Clearvox\Asterisk\AMI\Process;
use Clearvox\Asterisk\AMI\Manager;
use React\Dns\Protocol\BinaryDumper;
use React\Dns\Protocol\Parser;
use React\Dns\Query\Executor;
use React\Dns\Resolver\Resolver;
use React\EventLoop\Factory;
use React\Socket\Connector;
use React\Stream\Stream;

require __DIR__ . '/../vendor/autoload.php';

$loop = Factory::create();

$resolver  = new Resolver('127.0.0.1', new Executor($loop, new Parser(), new BinaryDumper()));
$connector = new Connector($loop, $resolver);

$promise = $connector->create('192.168.178.28', '5038');

$eventFinder = new EventFinder();
$process     = new Process($eventFinder);

$promise = $promise->then(
    function (Stream $stream) use ($process) {
        return new Manager($stream, $process);
    }
);

$promise = $promise->then(
    function (Manager $socket) {
        $loginAction = new LoginAction('clearvox', 'XwGWsTIVtGRuCrtMH9t9');


        return $socket->send($loginAction)->then(
            function (ResponseMessage $response) use ($socket) {
                echo $response->getMessage();
                echo "\r\n";
                return $socket;
            },
            function ($error) use ($socket) {
                throw $error;
            }
        );
    }
);

$promise->then(
    function (Manager $socket) {

        $socket->on(
            'FullyBooted',
            function (FullyBootedEvent $fullyBooted) use($socket) {
                echo 'Fully Booted:' . $fullyBooted->getStatus() . ' ' . $fullyBooted->getPrivilege();
                return $socket;
            }
        );
    }
);

$promise = $promise->then(
    function (Manager $socket) {
        $commandAction = new CommandAction('sip reload');

        return $socket->send($commandAction)->then(
            function (ResponseMessage $response) use ($socket) {
                echo $response->getMessage();
                echo "\r\n";
                return $socket;
            },
            function ($error) {
                throw $error;
            }
        );
    }
);


$loop->run();