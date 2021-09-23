<?php

namespace App\Repositories;

class UserRepository extends BaseRepository
{
    protected $_relationships = ['roles', 'orders'];

    public function getModel()
    {
        return \App\Models\User::class;
    }
}
