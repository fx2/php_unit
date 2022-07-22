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
        $this->clientRepository = $this->createMock(ClientRepository::class);
        $this->clientService = new ClientService($this->clientRepository);
    }

    public function testSaveClient()
    {
        $this->clientRepository->method('save')->willReturn([
            'id' => 1, 'name' => 'Batima'
        ]);
        $response = $this->clientService->saveClient('Batima');

        $this->assertIsArray($response);
        $this->assertEquals('Batima', $response['name']);
    }

    public function testSaveClientWithException()
    {
        $this->clientRepository->method('getByName')->willReturn([
            'id' => 1, 'name' => 'AM'
        ]);

        $this->clientRepository->method('save')->willReturn(
            $this->throwException(new Exception())
        );

        $this->expectException('Exception');
        $this->clientService->saveClient('AM');
    }

    public function testGetClient()
    {
        $this->clientRepository->method('getByName')->willReturn([]);
        $response = $this->clientService->getClient('Fernando');

        $this->assertIsArray($response);
    }

    public function testGetClientWithEmptyName()
    {
        $this->clientRepository->method('get')->willReturn([]);
        $response = $this->clientService->getClient();

        $this->assertIsArray($response);
    }

    public function testDisponibilidade()
    {
        $this->clientRepository->method('disponibilidade')->willReturn(1);
        $response = $this->clientService->disponibilidade();

        $this->assertEquals(1, $response);
    }
}