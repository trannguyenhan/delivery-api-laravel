<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->repository = new UserRepository();
    }

    public function list(Request $request){
        return $this->doList($request);
    }

    public function foods($user){
        return User::find($user)->orders()->get();
    }
}
