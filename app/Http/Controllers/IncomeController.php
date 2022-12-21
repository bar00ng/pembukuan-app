<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Income;

class IncomeController extends Controller
{
    public function index(){
        $products = Product::get();

        return view('pemasukan', ['products' => $products]);
    }

    public function store(Request $r){
        $cart = session()->get('cart');
       
        $validated = $r->validate([
            'totalPemasukan' => 'required',
            'hargaModal' => 'required',
            'keuntungan' => 'required',
        ]);

        Income::create([
            'details' => $cart,
            'totalPemasukan' => $r->totalPemasukan,
            'hargaModal' => $r->hargaModal,
            'keuntungan' => $r->keuntungan,
        ]);

        $r->session()->forget('cart');
        return redirect('')->with('Message', 'Berhasil dimasukkan');
    }
}
