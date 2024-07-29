#!/usr/bin/env php
<?php
declare(strict_types=1);

require __DIR__.'/../vendor/autoload.php';

use App\Command\GetUsersAsJsonCommand;
use App\Command\GetUsersAsProtobufCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\HttpClient\HttpClient;

if (!array_key_exists("USER_SERVICE_URL", $_ENV)) {
    die("Environment variable USER_SERVICE_URL is undefined.");
}

define("SERVICE_URL", $_ENV["USER_SERVICE_URL"]);

$client = HttpClient::create([
    'max_redirects' => 7,
]);

$application = new Application();

$application->add(new GetUsersAsProtobufCommand($client));
$application->add(new GetUsersAsJsonCommand($client));

$application->run();
?>