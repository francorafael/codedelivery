<?php

namespace CodeDelivery\Events;

use CodeDelivery\Events\Event;
use CodeDelivery\Models\Geo;
use CodeDelivery\Models\Order;
use Illuminate\Queue\SerializesModels;
//IMPLEMENTAR ShouldBroadcast - QUE O LARAVEL VAI SER QUE VAMOS UTILIZAR O PUSHER
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class GetLocationDeliveryman extends Event implements ShouldBroadcast
{
    use SerializesModels;

    //SERIALIZAR O GEO
    public $geo;

    private $model;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Geo $geo, Order $order)
    {
        $this->geo = $geo;
        $this->model = $order;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        //QUANDO O ENTREGADOR SAI RPARA ENTREGAR ELE TEM QUE AAPERTAR O BOTAO
        //STATUS DA ORDER ENTRA EM TRAG
        //VOU GERAR UM HASH E ESSE HASH VAI SER O CANAL DE COMUNICAO ENTRE O ENTREGADOR E O CLIENT
        return [$this->model->hash];
    }
}
