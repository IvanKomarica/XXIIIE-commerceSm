<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($category, $product_id)
    {
        $item = Product::where('id', $product_id)->first();

        return view('product.show', [
            'item' => $item,
        ]);
    }

    public function showCategory($category)
    {
        $category = Category::where('alias', $category)->first();

        return view('categories.index', [
            'category' => $category
        ]);
    }
}
