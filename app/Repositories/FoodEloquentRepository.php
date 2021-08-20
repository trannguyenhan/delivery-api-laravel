<?php

namespace App\Repositories;

class FoodEloquentRepository extends EloquentRepository
{

    public function getModel()
    {
        return \App\Models\Food::class;
    }
}
