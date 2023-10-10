<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order_rule;
use Illuminate\Http\Request;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('active', true)->get();
        return view('products.index')
                ->with(compact('products'))
                ->with('categories', Category::all());
    }
    public function showcategory($category)
    {
        $products = Product::where('category_id', $category)->get();
        return view('products.PublicCategoryPage', compact('products', "category"))
                ->with('categories', Category::all());;
    }

    public function show(Product $product)
    {
        return view('products.show')
                ->with(compact('product'));
    }

    public function order(Product $product, Request $request)
    {
        $rule = new Order_rule();
        $rule->product = $product;
        $rule->type = $request->type;
        $rule->size = $request->size;

        $request->session()->push('cart', $rule);
        return redirect()->route('cart');
    }
}
