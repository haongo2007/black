<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{

    protected $table="products";

    protected $fillable = [
    'name' ,'slug','discount', 'price', 'in_stock', 'description', 'creator_id', 'categories_id', 'brand_id', 'tags'
    ];

    public function belongsToUser(){
        return $this->belongsTo(User::class,'creator_id','id');
    }
    public function hasManyAttr()
    {
        return $this->hasMany(Attribute::class,'product_id','id');
    }
    public function GetImages()
    {
        return $this->hasMany(ProductImages::class,'product_id','id');
    }
    public function GetCategoriesName()
    {
        return $this->hasOne(Categories::class,'id','categories_id');
    }
}
