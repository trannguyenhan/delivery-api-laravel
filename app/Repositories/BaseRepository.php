<?php

namespace App\Repositories;

abstract class BaseRepository
{
    // \App\Models\Name:class
    protected $_model;
    protected $_relationships = [];

    public function __construct()
    {
        $this->_model = app()->make($this->getModel());
    }

    /**
     * Return model will use in repository
     * \App\Models\Name::class
     */
    abstract public function getModel();

    public function list($keyword = null,
                         $page = null,
                         $pageSize = null,
                         $sortBy = null,
                         $desc = null){

        $query = $this->_model;

        // search name with keyword
        if($keyword != null){
            $query = $query->where('name', 'LIKE', "%$keyword%");
        }

        // paging
        if($page != null & $pageSize != null){
            $query = $query->skip(($page - 1) * $pageSize)->take($pageSize);
        }

        // sort by
        $descStatus = 'asc';
        if($desc == true){ $descStatus = 'desc';}

        if($sortBy != null){
            if(is_array($sortBy)){
                foreach ($sortBy as $sort){
                    // sort with field in SORT_FIELDS
                    if(!in_array($sort, $this->_model::SORT_FIELDS)){
                        continue;
                    }

                    $query = $query->orderBy($sort, $descStatus);
                }
            } else {
                if(in_array($sortBy, $this->_model::SORT_FIELDS)){
                    $query = $query->orderBy($sortBy, $descStatus);
                }
            }
        }

        // relationship
        if(count($this->_relationships) != 0){
            foreach ($this->_relationships as $relationship){
                $query = $query->with($relationship);
            }
        }

        return \App\Helper::successResponse($query->get()->toArray());
    }

    public function create($arr){
        $model = $this->_model;

        $model->fill($arr);
        if($model->save()){
            return \App\Helper::successResponse($model);
        } else {
            return \App\Helper::errorResponse();
        }
    }
}
