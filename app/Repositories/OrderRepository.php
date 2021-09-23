<?php

namespace App\Repositories;

use App\Models\Order;

class OrderRepository extends BaseRepository
{
    protected $_relationships = ['foods'];

    public function getModel()
    {
        return \App\Models\Order::class;
    }

    public function create($arr){
        $time = date('Y-m-d h:i:s');
        $arr['time'] = $time;
        $arr['status'] = 0; // status 0 is pending

        $order = $this->_model;
        $order->fill($arr);

        if(!$order->save()){
            return \App\Helper::errorResponse("order fail!");
        }

        $order->foods()->attach($arr['food_id'], ['quantity' => $arr['quantity']]);
        return \App\Helper::successResponse($arr);
    }

    public function accept($request){
        $order_name = $request->input('id');
        $status = $request->input('status');

        $order = Order::where('id', $order_name)->update(['status' => $status]);
        return \App\Helper::successResponse($order);
    }
}
