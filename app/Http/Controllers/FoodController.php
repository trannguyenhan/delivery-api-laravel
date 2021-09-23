<?php

namespace App\Http\Controllers;

use App\Http\Requests\Food\FoodCreateRequest;
use Illuminate\Http\Request;
use App\Repositories\FoodRepository;

class FoodController extends Controller
{
    public function __construct()
    {
        $this->repository = new FoodRepository();
    }

    public function list(Request $request){
        return $this->doList($request);
    }

    public function create(FoodCreateRequest $request){
        return $this->doCreate($request, \App\Models\Food::INSERT_FIELDS);
    }
}
