<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'user_id', 'address', 'time', 'status', 'name'];
    protected $table = 'orders';
    public $timestamps = false;

    public function foods(){
        return $this->belongsToMany(\App\Models\Food::class);
    }
}
