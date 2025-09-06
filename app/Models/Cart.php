<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
     protected $fillable = [
        'title',
        'details',
        'image',
        'price',
        'quantity'
        
    ];

}
