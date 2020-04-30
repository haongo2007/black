<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    protected $table="product_images";
    protected $fillable = [
        'value', 'product_id', 'key_attr_id',
    ];
    public $timestamps = false;
}
