<?php

namespace App\Http\Controllers;

use App\Modeles\ProductDAO;

class WelcomeController extends Controller
{

    public function index()
    {
        $productDAO = new ProductDAO();
        $products = $productDAO->getMany(8);
        return view('welcome', compact('products'));
    }
}
