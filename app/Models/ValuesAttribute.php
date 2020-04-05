<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ValuesAttribute extends Model
{
    protected $table="values_attribute";

    public $timestamps = false;
    
    protected $fillable = [
        'value', 'image', 'optional', 'attribute_id'
    ];
}
