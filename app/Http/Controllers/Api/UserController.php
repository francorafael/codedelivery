<?php

namespace CodeDelivery\Http\Controllers\Api;

use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Http\Requests;
use CodeDelivery\Repositories\UserRepository;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;


class UserController extends Controller
{

    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {

    }

    public function authenticated()
    {
        $userId = Authorizer::getResourceOwnerId();
        //return $this->userRepository->with(['client'])->find($userId);
        return $this->userRepository->skipPresenter(false)->find($userId);
    }


}
