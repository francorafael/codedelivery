<?php

namespace CodeDelivery\Transformers;

use League\Fractal\TransformerAbstract;
use CodeDelivery\Models\Deliveryman;

/**
 * Class DeliverymanTransformer
 * @package namespace CodeDelivery\Transformers;
 */
class DeliverymanTransformer extends TransformerAbstract
{

    /**
     * Transform the \Deliveryman entity
     * @param \Deliveryman $model
     *
     * @return array
     */
    public function transform(Deliveryman $model)
    {
        return [
            'id'            => $model->id,
            'name'          => $model->user()->first()->name,
            'email'         => $model->user()->first()->email
        ];
    }
}
