<?php

namespace App\Repositories;

use App\Constants\Code;
use App\Models\Order;

class FoodRepository extends BaseRepository
{

    public function getModel()
    {
        return \App\Models\Food::class;
    }
}
