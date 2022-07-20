<?php

use App\Entities\Client;
use App\Repositories\ClientRepository;
use App\Services\ClientService;
use PHPUnit\Framework\TestCase;

class ClientServiceTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->client = new Client();
        $this->clientRepository = new ClientRepository($this->client);
        $this->clientService = new ClientService($this->clientRepository);
    }

    public function testSaveClient()
    {
        $response = $this->clientService->saveClient('Batima');

        $this->assertIsArray($response);
        $this->assertEquals('Batima', $response['name']);
    }

    public function testSaveClientWithException()
    {
        $this->expectException('Exception');
        $this->clientService->saveClient('AM');
    }

    public function testGetClient()
    {
        $response = $this->clientService->getClient('Fernando');

        $this->assertIsArray($response);
    }

    public function testGetClientWithEmptyName()
    {
        $response = $this->clientService->getClient();

        $this->assertIsArray($response);
    }
}