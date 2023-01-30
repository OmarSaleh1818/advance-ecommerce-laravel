<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartPageController extends Controller
{
    
    public function MyCartPage() {

        return view('frontend.mycart.view_cart');

    }

    public function MyCartProduct() {

        $carts = Cart::content();

        $cartQty = Cart::count();

        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
            'cartTotal' => round($cartTotal),
        ));

    }


}
