<?php

namespace CodeDelivery\Services;

use CodeDelivery\Models\Order;
use CodeDelivery\Repositories\CupomRepository;
use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\ProductRepository;
use Illuminate\Support\Facades\DB;


class OrderService
{

    private $orderRepository;
    private $cupomRepository;
    private $productRepository;

    public function __construct(OrderRepository $orderRepository, CupomRepository $cupomRepository, ProductRepository $productRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->cupomRepository = $cupomRepository;
        $this->productRepository = $productRepository;
    }

    public function update(array $data, $id)
    {
        $this->clientRepository->update($data, $id);
        $userId = $this->clientRepository->find($id, ['user_id'])->user_id;
        $this->userRepository->update($data['user'], $userId);
    }

    public function create(array $data)
    {
       //TRANSACAO

        \DB::beginTransaction();
        try {
            $data['status'] = 0;

        if(isset($data['cupom_id']))
        {
            unset($data['cupom_id']);
        }
        if(isset($data['cupom_code']))
        {
            $cupom = $this->cupomRepository->findByField('code', $data['cupom_code'])->first();
            $data['cupom_id'] = $cupom->id;
            $cupom->used = 1;
            $cupom->save();
            unset($data['cupom_code']);
        }

        $items = $data['items'];
        unset($data['items']);

        $order = $this->orderRepository->create($data);
        $total = 0;

        foreach($items as $item)
        {
            $item['price'] = $this->productRepository->find($item['product_id'])->price;
            $order->items()->create($item);
            $total += $item['price'] * $item['qtd'];
        }

        $order->total = $total;

        //SE TIVER UTILIZANDO CUPOM
        if(isset($cupom))
        {
            $order->total = $total - $cupom->value;
        }

        $order->save();
        \DB::commit();
        return $order;
        } catch (\Exception $e) {
            \DB::rollback();
            throw $e;
        }
    }

    public function updateStatus($id, $idDeliveryman, $status)
    {
        $order = $this->orderRepository->getByIdAndDeliveryman($id, $idDeliveryman);
        $order->status = $status;
        //GERAR HASH CASO NAO TENHA E O ESTATUS FOR ENTREGANDO
        if((int)$order->status == 1 && !$order->hash)
        {
            $order->hash = md5((new \DateTime())->getTimestamp());
        }
        $order->save();
        return $order;
    }
}