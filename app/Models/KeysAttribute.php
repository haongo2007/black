<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KeysAttribute extends Model
{
    protected $table="keys_attribute";

    public $timestamps = false;
    
    protected $fillable = [
        'name'
    ];
}
