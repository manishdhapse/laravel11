<?php

namespace App\Models;

use Maatwebsite\Excel\Concerns\Importable;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{


    protected $fillable = [
        'name',         // Add this attribute
        'status',       // Example: Add other attributes
        'lease_to_own', // Example: Add more attributes as needed
        'buy_now_price',
        'floor_price',
        'minimum_offer',
        'sale_lander',
    ];
}
