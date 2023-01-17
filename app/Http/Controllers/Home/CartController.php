<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

class CartController extends Controller
{
    
    public function AddCartStore(Request $request, $id) {

        $product = Product::findOrFail($id);

        Cart::insert([
            'product_name' => $product->product_name_en,
            'color' => $request->color,
            'size' => $request->size,
            'quantity' => $request->quantity,
            'price' => $product->selling_price,
        ]);

        $notification = array(
            'message' => 'Your Cart Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);


    }



}
