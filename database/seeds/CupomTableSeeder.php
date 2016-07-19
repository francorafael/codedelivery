<?php

use Illuminate\Database\Seeder;
use \CodeDelivery\Models\Cupom;


class CupomTableSeeder extends Seeder
{
    public function run()
    {
        factory(Cupom::class, 10)->create();
    }
}
