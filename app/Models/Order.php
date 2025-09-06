<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{   
   
    protected $fillable = [
        'name',
        'email',
        'title',
        'phone',
        'address',
        'quantity',
        'price',
        'image',
        'delivery_details',
    ];

}
