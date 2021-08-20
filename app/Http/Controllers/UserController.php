<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserEloquentRepository;
use App\Models\User;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserEloquentRepository();
    }

    public function show(Request $request){
        return $this->userRepository->show($request);
    }

    public function foods($user){
        return User::find($user)->orders()->get();
    }
}
