<?php

namespace CodeDelivery\Repositories;

use CodeDelivery\Models\Order;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;


/**
 * Class OrderRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class OrderRepositoryEloquent extends BaseRepository implements OrderRepository
{

    //DESATIVOU O PRESENTER POR PADRÂO
    //QUANDO QUISER UTILIZAR TERA QUE ATIVAR
    protected $skipPresenter = true;

    public function getByIdAndDeliveryman($id, $idDeliveryman)
    {

        $result = $this->model
            ->where('id', $id)
            ->where('user_deliveryman_id', $idDeliveryman)
            ->first();

        if($result)
        {
            return $this->parserResult($result);
        }

        throw (new ModelNotFoundException())->setModel(get_class($this->model));

//        $result = $this->with(['client', 'items', 'deliveryman'])->findWhere(['id' => $id, 'user_deliveryman_id' => $idDeliveryman]);
//
//        if($result instanceof Collection)
//        {
//            $result = $result->first();
//        } else {
//            if(isset($result['data']) && count($result['data']) == 1)
//            {
//                $result = [
//                    'data' => $result['data'][0]
//                ];
//            } else {
//                throw new ModelNotFoundException("Order não existe");
//            }
//        }

//        if($result){
//            $result->items->each(function($item){
//                $item->product;
//            });
//        }
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Order::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function presenter()
    {
        return \CodeDelivery\Presenters\OrderPresenter::class;
    }
}
