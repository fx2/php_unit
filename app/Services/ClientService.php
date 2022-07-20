<?php

namespace App\Services;

use App\Repositories\ClientRepository;

class ClientService
{
    protected ClientRepository $clientRepository;

    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function saveClient(string $name)
    {
        $client = $this->clientRepository->getByName($name);
        if (!empty($client)) {
            throw new \Exception("O cliente {$name} já está cadastrado no banco");
        }

        return $this->clientRepository->save(4, $name);
    }

    public function getClient($name = '')
    {
        if ($name == '') {
            return $this->clientRepository->get();
        }

        return $this->clientRepository->getByName($name);
    }

    public function disponibilidade()
    {
        return $this->clientRepository->disponibilidade();
    }
}