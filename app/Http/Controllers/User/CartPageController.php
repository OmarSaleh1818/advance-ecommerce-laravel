<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartPageController extends Controller
{
    
    public function MyCartPage() {

        return view('frontend.mycart.view_cart');

    }

    public function MyCartProduct() {

        

    }


}
