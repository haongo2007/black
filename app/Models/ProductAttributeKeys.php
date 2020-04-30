<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttributeKeys extends Model
{
    protected $table="product_attribute_keys";

    public $timestamps = false;
    
    protected $fillable = [
        'name'
    ];
}
