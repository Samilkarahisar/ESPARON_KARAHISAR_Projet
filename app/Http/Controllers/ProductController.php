<?php

namespace App\Http\Controllers;

use App\Modeles\ProductCategoryDAO;
use App\Modeles\ProductDAO;

class ProductController extends Controller
{
    public function index($productCategoryId)
    {
        $productDAO = new ProductDAO();
        $products = $productDAO->getWithProductCategory($productCategoryId);
        $productCategoryDAO = new ProductCategoryDAO();
        $productCategory = $productCategoryDAO->get($productCategoryId);
        return view('product.index', compact(['products', 'productCategory']));
    }

    public function show($productId)
    {
        $productDAO = new ProductDAO();
        $product = $productDAO->get($productId);
        $productCategory = $product->getProductCategory();
        $sameCategoryProducts = $productDAO->getSameCategoryProducts($product->getId(), $productCategory->getId(), 3);
        return view('product.show', compact(['product', 'sameCategoryProducts']));
    }
}
