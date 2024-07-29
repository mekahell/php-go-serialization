<?php
namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use User\Service\V1\Users;
use Throwable;

define("CONTENT_TYPE_JSON", 'application/json');

#[AsCommand(name: 'json:get-users', description: "Get users as json format")]
class GetUsersAsJsonCommand extends GetUserCommand
{
    public function __construct(HttpClientInterface $httpClient)
    {
        parent::__construct($httpClient);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->initLogger($output);

        while ($this->shouldStop === false) {
            $start = hrtime(true);

            $resp = $this->httpClient->request("GET", SERVICE_URL, array(
                'headers' => [
                    'Accept' => CONTENT_TYPE_JSON,
                ],
            ));

            try {
                $data = $resp->getContent();

                $eta =  (hrtime(true) - $start)/1e+6;
                $this->logger->info("Elapsed ns are {$eta} for GET Request");

                $users = new Users();
                try {
                    $start = hrtime(true);
                    $users->mergeFromJsonString($data);
                    
                    $eta =  (hrtime(true) - $start)/1e+6;
                    $this->logger->info("Elapsed ns are {$eta} for unmarshall");
                }
                catch (Throwable $t) {
                    $this->logger->error("Fail to read the JSON response: {$t->getMessage()}");
                    return Command::FAILURE;
                }

                foreach ($users->getUsers() as $user) {
                    //$logger->info("User is {$user->getFirstName()}");
                }                
            }
            finally {
                $resp->cancel();   
            }
        }
        return Command::SUCCESS;
    }
}

?>