<?php

// https://viblo.asia/p/gioi-thieu-ve-thu-vien-reactphp-3P0lPAPv5ox
// https://www.youtube.com/playlist?list=PLKIEFFgNQYpVmUAKUjT_BRYYOdMHwGt0v
// https://sergeyzhuk.me/2017/07/17/reatcphp-http-server/

use React\Http\Server;
use React\EventLoop\Factory;
use React\Http\Message\Response;
use Psr\Http\Message\ServerRequestInterface;
use React\Socket\Server as SocketServer;

require('../vendor/autoload.php');

// Event loop
$loop = Factory::create();

$server = new Server(function (ServerRequestInterface $request) {
    return new Response(200, ['Content-Type' => 'text/plain'],  "Hello world\n");
});

$socket = new SocketServer('127.0.0.1:8000', $loop);

$server->listen($socket);

echo 'Listening on ' . str_replace('tcp:', 'http:', $socket->getAddress()) . "\n";

// run the application
$loop->run();
