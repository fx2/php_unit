<?php

use App\Entities\Client;
use App\Repositories\ClientRepository;
use App\Services\ClientService;

include_once 'vendor/autoload.php';

$client = new Client();

//print_r($client->testes());


$clientRepository = new ClientRepository($client);

//print_r($clientRepository->save(1, 'Fernando'));
//print_r($clientRepository->get());
//print_r($clientRepository->getByName('Caio'));

$clientService = new ClientService($clientRepository);

//print_r($clientService->saveClient('Caio'));
print_r($clientService->getClient('Fernando'));
