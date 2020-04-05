<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function index()
    {
    	return view('web.collection.index',['page_name' => 'ecommerce-page']);
    }
}
