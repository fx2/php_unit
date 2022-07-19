<?php

namespace App\Entities;

class Client
{
    protected int $id;

    protected string $name;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function listOfClients()
    {
        return [
            ['id' => 1, 'name' => 'Fernando'],
            ['id' => 2, 'name' => 'Fran'],
            ['id' => 3, 'name' => 'AM']
        ];
    }

    public function verificaNumero(int $id)
    {
        if ($id > 5) {
            return 'maior que 5';
        }

        if ($id == 0) {
            throw new \Exception('Somente números maiores que ZERO');
        }

        return 'menor que 5';
    }
}