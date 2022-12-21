<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class IncomeController extends Controller
{
    public function index(){
        $products = Product::get();

        return view('pemasukan', ['products' => $products]);
    }
}
