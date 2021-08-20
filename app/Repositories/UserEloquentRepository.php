<?php

namespace App\Repositories;

class UserEloquentRepository extends EloquentRepository
{

    public function getModel()
    {
        return \App\Models\User::class;
    }
}
