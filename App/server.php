<?php
namespace App;

use App\Factory\MailerFactory;
use App\Mailer\BaseMailer;
use Psr\Http\Message\ServerRequestInterface;
use React\EventLoop\Factory;
use React\Http\Response;
use React\Http\Server;
use React\Socket\Server as SocketServer;


$loop = Factory::create();

$server = new Server(function (ServerRequestInterface $request) {

    $content = json_decode($request->getBody()->getContents(), true);

    $message = $content['message'] ?? [];
    $provider = $content['provider'] ?? 'mandrill';
    $template = $content['template'] ?? 'default';
    $vars = $content['vars'] ?? [];
    $settings = $content['settings'] ?? [];

    /** @var BaseMailer $mailer */
    $mailer = new MailerFactory($provider, $template, $vars, $settings);

    return new Response(
        200,
        ['Content-Type' => 'application/json'],
        json_encode($mailer->send($message))
    );
});

$socket = new SocketServer(8080, $loop);
$server->listen($socket);

echo "Server running at http://127.0.0.1:8080\n";

$loop->run();
