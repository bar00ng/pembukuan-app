<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index () {
        $products = Product::get();

        return view('listProduct', ['products' => $products]);
    }

    public function tampilFormTambah () {
        $categories = Category::get();

        return view('formTambahProduk', ['categories' => $categories]);
    }

    public function store (Request $r) {
        $validated = $r->validate([
            'productName' => 'required',
            'productPrice' => 'required',
            'productModel' => 'required',
            'category_id' => 'required',
            'inStock' => 'required'
        ]);

        $product = Product::create($validated);

        return redirect('/product')->with('Message', 'Berhasil Ditambahkan');
    }

    public function tampilFormEdit($id) {
        $product = Product::where('id',$id)->first();
        $categories = Category::get();

        return view('formEditProduk', ['product' => $product, 'categories' => $categories]);
    }

    public function patch(Request $r, $id) {
        $validated = $r->validate([
            'productName' => 'required',
            'productPrice' => 'required',
            'productModel' => 'required',
            'category_id' => 'required',
            'inStock' => 'required'
        ]);

        $product = Product::where('id',$id)->update($validated);

        return redirect('/product')->with('Message', 'Berhasil diedit');
    }

    public function delete($id) {
        Product::where('id',$id)->delete();

        return redirect('/product')->with('Message', 'Berhasil dihapus');
    }
}
