<?php

namespace CodeDelivery\Transformers;

use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\Order;

/**
 * Class OrderTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class OrderTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['cupom', 'items', 'client', 'deliveryman'];
    // tenho que passar os includes por paramentros atraves do GET
    //protected $availableIncludes = [];
    /**
     * Transform the \Order entity
     * @param \Order $model
     *
     * @return array
     */
    public function transform(Order $model)
    {
        return [
            'id'         => (int) $model->id,
            'total'      => $model->total,
            'status'     => \CodeDelivery\Http\Helpers\formatStatusOrder($model->status),
            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }


    public function includeClient(Order $model)
    {
        return $this->item($model->client, new ClientTransformer());
    }

    public function includeDeliveryman(Order $model)
    {
        if(!$model->deliveryman)
            return null;

        return $this->item($model->deliveryman, new DeliverymanTransformer());
    }

    //Many to One - CUmpo
    /*TODO MEDOTO PARA SERIALZAR O RELACIONAMENTO*/
    public function includeCupom(Order $model)
    {
        //VALIDANDO O CUPOM - PQ O CUPOM PODE OU NAO PODE EXISTIR
        if(!$model->cupom)
            return null;

        return $this->item($model->cupom, new CupomTransformer());
    }

    //One To Many - Items
    public function includeItems(Order $model)
    {
        return $this->collection($model->items, new OrderItemTransformer());
    }
}
