<?php

namespace App\Repositories;

use App\Entities\Client;

class ClientRepository
{
    protected Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function save(int $id, string $name)
    {
        $client = new $this->client();
        $client->setId($id);
        $client->setName($name);

//        $client->insert();

        return ['id' => $client->getId(), 'name' => $client->getName()];
    }

    public function get()
    {
        return $this->client->listOfClients();
    }

    public function getByName($name)
    {
        return array_filter($this->client->listOfClients(), function ($client) use ($name) {
            return $client['name'] == $name;
        });
    }
}