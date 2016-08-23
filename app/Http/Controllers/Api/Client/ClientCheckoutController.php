<?php

namespace CodeDelivery\Http\Controllers\Api\Client;

use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Requests\CheckoutRequest;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\ProductRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;


class ClientCheckoutController extends Controller
{


    private $orderRepository;
    private $userRepository;
    private $productRepository;
    private $orderService;

    //definir as relações que precisamos serializar
    private $with = ['items', 'client', 'cupom'];

    public function __construct(OrderRepository $orderRepository, UserRepository $userRepository, ProductRepository $productRepository, OrderService $orderService)
    {
        $this->orderRepository = $orderRepository;
        $this->userRepository = $userRepository;
        $this->productRepository = $productRepository;
        $this->orderService = $orderService;
    }

    public function index()
    {
        $id = Authorizer::getResourceOwnerId();
        $clientId = $this->userRepository->skipPresenter()->find($id)->client->id;
        $orders = $this->orderRepository
            ->skipPresenter(false)
            ->with($this->with)->scopeQuery(function($query) use ($clientId) {
            return $query->where('client_id', '=', $clientId);
        })->paginate();

        return $orders;
    }

    public function store(CheckoutRequest $request)
    {
        $data = $request->all();
        $id = Authorizer::getResourceOwnerId();
        $clientId = $this->userRepository->find($id)->client->id;
        $data['client_id'] = $clientId;
        $order = $this->orderService->create($data);
        //$order = $this->orderRepository->with(['items'])->find($order->id);
        return $this->orderRepository
            ->skipPresenter(false)
            ->with($this->with)->find($order->id);
    }

    public function show($id)
    {
        return $order = $this->orderRepository
            ->skipPresenter(false)
            ->with($this->with)->find($id);
        //COLLECTION DO LARAVEL - EACH PODEMOS APLICAR COISAS PARA CADA REGISTRO
//        $order->items->each(function($item){
//            $item->product;
//        });
        //return $order;
    }



}
