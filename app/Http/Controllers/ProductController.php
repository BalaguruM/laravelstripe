<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Stripe;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
		$product = Product::all();
		$productList = compact('product');
        return view('product.product')->with('data', $productList['product']);
    }
}
