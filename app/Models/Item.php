<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //

    // Define the fields that can be mass-assigned
    protected $fillable = ['name'];
}
