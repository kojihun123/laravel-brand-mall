<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index(){
        $products = Product::latest()->paginate(3);
        return Inertia::render('Products/Index', compact('products'));
    }

    public function show($slug){
        $product = Product::where('slug', $slug)->firstOrFail();
        return Inertia::render('Products/Show', compact('product'));
    }
}
