<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected $repository;

    /**
     * @param Request $request
     * @return mixed
     */
    public function doList(Request $request){
        $arr = $request->only(\App\Constants::LIST_FIELDS);

        return $this->repository->list(
            array_key_exists('name', $arr)? $arr['name'] : null,
            array_key_exists('page', $arr)? $arr['page'] : null,
            array_key_exists('page_size', $arr)? $arr['page_size'] : null,
            array_key_exists('sort_by', $arr)? $arr['sort_by'] : null,
            array_key_exists('desc', $arr)? $arr['desc'] : null
        );
    }

    /**
     * @param Request $request
     * @param $fields
     */
    public function doCreate(Request $request, $fields){
        $arr = $request->only($fields);
        return $this->repository->create($arr);
    }
}
