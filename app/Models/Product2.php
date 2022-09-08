<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product2 extends Model
{
    use HasFactory;
    protected $table = 'products2';
    protected $fillable = [
        'name',
        'description',
        'price',
        'qty'
    ]; 
    protected $casts = [
        'created_at' => 'datetime:D, M d, Y h:i A',//'datetime:Y-m-d H:00',
        'updated_at' => 'datetime:D, M d, Y h:i A',
    ];

}
