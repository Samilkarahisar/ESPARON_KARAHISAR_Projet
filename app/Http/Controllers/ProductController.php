<?php

namespace App\Http\Controllers;

use App\OrderProduct;
use App\ProductCategory;
use DB;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Show all products that correspond to the product category.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(ProductCategory $productCategory)
    {
        $products = $productCategory->products;
        return view('product.index', compact('products'));
    }

    public function show(Product $product)
    {
        $productCategory = $product->productCategory;
        $sameCategoryProducts = Product::where([['id', '!=', $product->id], ['product_category_id', '=', $productCategory->id]])->limit(3)->get();
        return view('product.show', compact(['product', 'sameCategoryProducts']));
    }
}
