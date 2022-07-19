<?php

use App\Entities\Client;
use App\Repositories\ClientRepository;
use PHPUnit\Framework\TestCase;

class ClientRepositoryTest extends TestCase
{
    public function testSave()
    {
        $client = new Client();
        $clientRepository = new ClientRepository($client);

        $response = $clientRepository->save(1, 'Fernando');

        $this->assertEquals('Fernando', $response['name']);
    }

    public function testGet()
    {
        $client = new Client();
        $clientRepository = new ClientRepository($client);

        $response = $clientRepository->get();

        $this->assertIsArray($response);
    }

    public function testGetByName()
    {
        $client = new Client();
        $clientRepository = new ClientRepository($client);

        $response = $clientRepository->getByName('Fernando');

        $this->assertIsArray($response);
        $this->assertEquals('Fernando', $response[0]['name']);
    }
}