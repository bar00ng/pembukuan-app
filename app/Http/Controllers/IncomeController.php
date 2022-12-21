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
        if (!empty($r->input('description'))) {
            $validated['description'] = $r->description;
        }
        $validated['details'] = $cart;
        $validated['status'] = $r->status;

        Income::create($validated);

       

        $r->session()->forget('cart');
        return redirect('')->with('Message', 'Berhasil dimasukkan');
    }
}
