<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    const SORT_FIELDS = ['name', 'created_at', 'updated_at'];
    const INSERT_FIELDS = ['name', 'user_id', 'address', 'food_id', 'quantity'];
    const UPDATE_FIELDS = ['id', 'status'];

    protected $fillable = ['id', 'user_id', 'address', 'time', 'status', 'name'];
    protected $table = 'orders';
    public $timestamps = false;

    public function foods(){
        return $this->belongsToMany(\App\Models\Food::class)->withPivot('quantity');
    }
}
