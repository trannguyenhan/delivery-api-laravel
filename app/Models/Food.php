<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    const SORT_FIELDS = ['name', 'created_at', 'updated_at'];
    const INSERT_FIELDS = ['name', 'price'];

    protected $fillable = ['id', 'name', 'price'];
    protected $table = 'foods';
    public $timestamps = false;
}
