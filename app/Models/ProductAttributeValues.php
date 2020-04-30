<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttributeValues extends Model
{
    protected $table="product_attribute_values";

    public $timestamps = false;
    
    protected $fillable = [
        'value', 'product_id', 'color_code', 'product_attribute_key_id'
    ];
}
