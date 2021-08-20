<?php

namespace App\Repositories;

use App\Constants\Code;
use App\Models\Order;
use Illuminate\Support\Facades\Validator;

class OrderEloquentRepository extends EloquentRepository
{
    public function getModel()
    {
        return \App\Models\Order::class;
    }

    public function update($request){
        // validate information login
        $request->validated();

        $order_name = $request->input('name');
        $status = $request->input('status');

        $order = Order::where('name', $order_name)->update(['status' => $status]);
        return response()->json(['message' => 'update successfully']);
    }
}
