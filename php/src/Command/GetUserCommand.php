<?php
namespace App\Command;

use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Command\SignalableCommandInterface;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

abstract class GetUserCommand extends Command implements SignalableCommandInterface
{
    protected LoggerInterface $logger;
    protected bool $shouldStop = false;
    protected HttpClientInterface $httpClient;

    public function __construct(HttpClientInterface $httpClient)
    {
        parent::__construct();
        $this->httpClient = $httpClient;        
    }

    protected function initLogger(OutputInterface $output) {
        $verbosityLevelMap = [
            LogLevel::NOTICE => OutputInterface::VERBOSITY_NORMAL,
            LogLevel::INFO   => OutputInterface::VERBOSITY_NORMAL,
        ];
        $this->logger = new ConsoleLogger($output, $verbosityLevelMap);
    }

    public function getSubscribedSignals(): array
    {
        return [
            SIGINT,
            SIGTERM,
        ];
    }

    public function handleSignal(int $signal, int|false $previousExitCode = 0): int|false
    {
        $this->logger->info('Signal received, stopping the command...', [
            'signal' => $signal,
        ]);
        $this->shouldStop = true;

        return false;
    }
}

?>