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

    public function showCategory(Request $request, $alias)
    {
        $category = Category::where('alias', $alias)->first();

        $count = 2;

        $products = Product::where('category_id', $category->id)->paginate($count);

        if(isset($request->orderBy))
        {
            if($request->orderBy == 'price-low-high')
            {
                $products = Product::where('category_id', $category->id)->orderBy('price')->paginate($count);
            }
            if($request->orderBy == 'price-high-low')
            {
                $products = Product::where('category_id', $category->id)->orderBy('price', 'desc')->paginate($count);
            }
            if($request->orderBy == 'name-a-z')
            {
                $products = Product::where('category_id', $category->id)->orderBy('title')->paginate($count);
            }
            if($request->orderBy == 'name-z-a')
            {
                $products = Product::where('category_id', $category->id)->orderBy('title', 'desc')->paginate($count);
            }
        }
        if($request->ajax())
        {
            return view('ajax.order-by', [
                'products' => $products,
                'request' => $request,
            ])->render();
        }

        return view('categories.index', [
            'category' => $category,
            'products' => $products,
            'request' => $request,
        ]);
    }
}
