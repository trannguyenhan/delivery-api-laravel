<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'user_id', 'food_id', 'address', 'time', 'status', 'code'];
    protected $table = 'orders';
    public $timestamps = false;
}
