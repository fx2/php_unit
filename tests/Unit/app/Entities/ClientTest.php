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
     * @dataProvider verificaNumerosProvider
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

    public function verificaNumerosProvider()
    {
        yield 'maior_que_cinco' => $this->maiorQueCinco();

        yield 'menor_que_cinco' => ['menor que 5', 4, null];

        yield 'igual_a_zero' => ['', 0, 'Exception'];

    }

    public function maiorQueCinco()
    {
        return [
            'maior que 5',
            8,
            null
        ];
    }
}