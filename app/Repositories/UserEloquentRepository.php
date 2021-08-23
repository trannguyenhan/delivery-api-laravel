<?php

namespace App\Repositories;

class UserEloquentRepository extends EloquentRepository
{
    protected $_relationships = ['roles', 'orders'];

    public function getModel()
    {
        return \App\Models\User::class;
    }
}
