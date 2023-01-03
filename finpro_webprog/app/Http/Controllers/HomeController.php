<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {   
        $category = collect(['House', 'Food', 'Camera', 'Kitchen']);
        $product = Product::search($request->search)->get();

        $data = [
            'categories' => $category,
            'products' => $product,
            'search' => $request->search
        ];

        return view('home', $data);
    }

    public function show($id)
    {
        $data = Product::find($id);

        return view('product.detail', ['data' => $data]);
    }

    public function category($category)
    {
        $product = Product::where('category', $category)->paginate(10);
        $data = [
        'products' => $product
        ];
        
        return view('product.productCategories', $data);
    }
}
