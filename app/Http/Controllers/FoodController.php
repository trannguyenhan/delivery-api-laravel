<?php

namespace App\Http\Controllers;

use App\Http\Requests\FoodCreateRequest;
use Illuminate\Http\Request;
use App\Repositories\FoodEloquentRepository;

class FoodController extends Controller
{
    protected $foodRepository;

    public function __construct()
    {
        $this->foodRepository = new FoodEloquentRepository();
    }

    public function show(Request $request){
        return $this->foodRepository->show($request);
    }

    public function create(FoodCreateRequest $request){
        return $this->foodRepository->create($request);
    }
}
