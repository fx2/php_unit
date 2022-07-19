<?php

namespace Tests\providers;

class ClientProvider
{
    static function verificaNumerosProvider()
    {
        yield 'maior_que_cinco' => self::maiorQueCinco();

        yield 'menor_que_cinco' => ['menor que 5', 4, null];

        yield 'igual_a_zero' => ['', 0, 'Exception'];

    }

    static function maiorQueCinco()
    {
        return [
            'maior que 5',
            8,
            null
        ];
    }
}