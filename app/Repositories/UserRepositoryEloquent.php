<?php

namespace CodeDelivery\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeDelivery\Repositories\UserRepository;
use CodeDelivery\Models\User;
use CodeDelivery\Validators\UserValidator;

/**
 * Class UserRepositoryEloquent
 * @package namespace CodeDelivery\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */

    protected $skipPresenter = true;

    public function model()
    {
        return User::class;
    }

    public function  getDeliverymen()
    {
       return $this->model->where(['role'=>'deliveryman'])->lists('name', 'id');
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
        return \CodeDelivery\Presenters\UserPresenter::class;
    }
}
