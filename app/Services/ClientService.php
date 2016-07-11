<?php

namespace CodeDelivery\Services;


use CodeDelivery\Repositories\ClientRepository;
use CodeDelivery\Repositories\UserRepository;

class ClientService
{

    private $clientRepository;
    private $userRepository;

    public function __construct(ClientRepository $clientRepository, UserRepository $userRepository)
    {
        $this->clientRepository = $clientRepository;
        $this->userRepository = $userRepository;
    }

    public function update(array $data, $id)
    {
        $this->clientRepository->update($data, $id);
        $userId = $this->clientRepository->find($id, ['user_id'])->user_id;
        $this->userRepository->update($data['user'], $userId);
    }

    public function create(array $data)
    {
        //ATRIBUINDO A SENHA DO USUARIO PADRAO
        $data['user']['password'] = bcrypt(123456);
        //CRIANDO O USUARIO E RETORNANDO O USUARIO
        $userId = $this->userRepository->create($data['user'])->id;
        //ADD USER_ID NO ARRAY PRINCIPAL
        $data['user_id'] = $userId;
        //GRAVANDO CLIENT
        $this->clientRepository->create($data);
    }
}