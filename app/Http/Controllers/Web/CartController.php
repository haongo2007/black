<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
    	return view('web.cart.index',['page_name'=> 'shopping-cart']);
    }
}
