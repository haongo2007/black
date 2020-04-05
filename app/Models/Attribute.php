<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $table="attribute";

	private $modelPath = "App\Models\\";

    public $timestamps = false;
    
    protected $fillable = [
        'product_id', 'key_attr_id'
    ];
    public function hasManyValuesAttr()
    {
        return $this->hasMany($this->modelPath."ValuesAttribute",'attribute_id','id');
    }
}
