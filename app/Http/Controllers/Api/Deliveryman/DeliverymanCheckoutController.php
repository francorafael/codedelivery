<?php

namespace CodeDelivery\Http\Controllers\Api\Deliveryman;

use CodeDelivery\Events\GetLocationDeliveryman;
use CodeDelivery\Http\Controllers\Controller;
use CodeDelivery\Http\Requests;
use CodeDelivery\Models\Geo;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Services\OrderService;
use Illuminate\Http\Request;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;


class DeliverymanCheckoutController extends Controller
{


    private $orderRepository;
    private $userRepository;
    private $orderService;
    //definir as relações que precisamos serializar
    private $with = ['items', 'client', 'cupom'];
    public function __construct(OrderRepository $orderRepository, UserRepository $userRepository, OrderService $orderService)
    {
        $this->orderRepository = $orderRepository;
        $this->userRepository = $userRepository;
        $this->orderService = $orderService;
    }

    public function index()
    {
        $id = Authorizer::getResourceOwnerId();
        $orders = $this->orderRepository
            ->skipPresenter(false)
            ->with(['items'])->scopeQuery(function($query) use ($id) {
            return $query->where('user_deliveryman_id', '=', $id);
        })->paginate();

        return $orders;
    }

    public function show($id)
    {
        $idDeliveryman = Authorizer::getResourceOwnerId();
        return $this->orderRepository
            ->skipPresenter(false)
            ->getByIdAndDeliveryman($id, $idDeliveryman);
        return $order;
    }

    public function updateStatus(Request $request, $id)
    {
        $idDeliveryman = Authorizer::getResourceOwnerId();
        return $this->orderService->updateStatus($id, $idDeliveryman, $request->get('status'));
    }

    public function geo(Request $request, Geo $geo, $id)
    {
        $idDeliveryman = Authorizer::getResourceOwnerId();
        $order = $this->orderRepository->getByIdAndDeliveryman($id, $idDeliveryman);
        $geo->lat = $request->get('lat');
        $geo->long = $request->get('long');
        event(new GetLocationDeliveryman($geo, $order));
        return $geo;
    }



}
