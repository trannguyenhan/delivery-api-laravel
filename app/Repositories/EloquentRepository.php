<?php
namespace App\Repositories;

abstract class EloquentRepository{
    // \App\Models\Name:class
    protected $_model;

    public function __construct()
    {
        $this->_model = app()->make($this->getModel());
    }

    /**
     * Return model will use in repository
     * \App\Models\Name::class
     */
    abstract public function getModel();

    /**
     * Show list of model with parameter name, sort and pagination
     */
    public function show($request){
        // get value from parameter
        $name = $request->input('name');
        $page = $request->input('page');
        $pageSize = $request->input('page_size');
        $sortBy = $request->input('sort_by');
        $desc_status = $request->input('desc');

        // if desc_status = true then sort by desc opposite sort by asc
        $desc = 'asc';
        if($desc_status == 'true'){ $desc = 'desc';}

        // if value is null, create default value
        if($name == '') $name = '';
        if($page == '') $page = 0;
        if($pageSize == '') $pageSize = 10;
        if($sortBy == '') $sortBy = 'id';

        // sort by each property assigned
        $listSort = explode('|', $sortBy);
        $modelsBuilder = $this->_model;

        foreach ($listSort as $sort){
            $modelsBuilder = $modelsBuilder->orderBy($sort, $desc);
        }

        // get records final and pagination
        $modelsBuilder = $modelsBuilder
            ->where('name', 'like', '%' . $name . '%')
            ->skip($page * $pageSize)
            ->take($pageSize);

        return $modelsBuilder->get();
    }
}
