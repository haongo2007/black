<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
	private $modelPath = "App\Models\\";

    protected $table="products";

    protected $fillable = [
    'name' , 'discount', 'price', 'in_stock', 'description', 'creator_id', 'categories_id', 'brand_id', 'tags'
    ];

    public function belongsToUser(){
        return $this->belongsTo($this->modelPath."User",'creator_id','id');
    }
    public function hasManyAttr()
    {
        return $this->hasMany($this->modelPath."Attribute",'product_id','id');
    }
}
