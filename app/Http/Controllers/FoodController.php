<?php

namespace App\Http\Controllers;

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
}
