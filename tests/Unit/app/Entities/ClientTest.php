<?php

use App\Entities\Client;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    public function testListOfClients()
    {
        $client = new Client();
        $response = $client->listOfClients();

        $this->assertIsArray($response);
        $this->assertEquals(3, count($response));
    }

    /**
     * @dataProvider Tests\providers\ClientProvider::verificaNumerosProvider()
     * @return void
     * @throws Exception
     */
    public function testVerificaNumeros($expected, $id, $exeption)
    {
        if ($exeption) {
            $this->expectException('Exception');
        }

        $client = new Client();
        $response = $client->verificaNumero($id);

        $this->assertEquals($expected, $response);
    }
}