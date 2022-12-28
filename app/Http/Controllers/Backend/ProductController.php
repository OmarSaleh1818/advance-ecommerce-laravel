<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Brand;
use App\Models\Product;



class ProductController extends Controller
{
    
    public function AddProduct() {

        $category = Category::latest()->get();
        $brand = Brand::latest()->get();
        return view('backend.product.product_add', compact('category', 'brand'));

    }
    

}
