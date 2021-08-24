<?php

namespace App\Repositories;

use App\Constants\Code;
use App\Models\Order;

class FoodEloquentRepository extends EloquentRepository
{

    public function getModel()
    {
        return \App\Models\Food::class;
    }

    public function create($request){
        // validate information login
        $request->validated();

        $food_id = $request->input('id');
        $quantity = $request->input('quantity');
        $address = $request->input('address');
        $time = date('Y-m-d h:i:s');

        $order = Order::create([
            'user_id' => auth()->id(),
            'address' => $address,
            'time' => $time,
            'status' => 0
        ]);

        $order->foods()->attach($food_id, ['quantity' => $quantity]);

        return response()->json([
           'code' => Code::OK,
           'message' => 'order successfully'
        ]);
    }
}
