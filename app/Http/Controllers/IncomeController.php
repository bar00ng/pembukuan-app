<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Income;
use Carbon\Carbon;

class IncomeController extends Controller
{
    public function index() {
        $incomes = Income::orderBy('created_at')
                    ->get()
                    ->groupBy(function ($val){
                        return Carbon::parse($val->created_at)->format('d M Y');
                    });
        
        return view('pemasukan.listPemasukan', compact('incomes'));
    }

    public function formAddPemasukan(){
        $products = Product::get();

        return view('pemasukan.formTambahPemasukan', ['products' => $products]);
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
        if (session('cart')) {
            $validated['details'] = $cart;
        }
        $validated['status'] = $r->status;

        Income::create($validated);

        $r->session()->forget('cart');
        return redirect('/income')->with('Message', 'Berhasil dimasukkan');
    }

    public function formEditPemasukan($id) {
        $products = Product::get();
        $income = Income::where('id',$id)->first();

        $cart = session()->get('cart',[]);

        $cart = $income['details']; 

        dump($cart);
        
        return view('pemasukan.formEditPemasukan',[
            'income' => $income,
            'products' => $products
        ]);
    }

    public function delete($id) {
        Income::where('id',$id)->delete();

        return redirect('/income')->with('Message', 'Berhasil dihapus');
    }
}
