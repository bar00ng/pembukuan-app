<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entry;

class IncomeController extends Controller
{
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
        $validated['isPemasukan'] = 1;

        Entry::create($validated);

        $r->session()->forget('cart');
        return redirect('/pembukuan')->with('Message', 'Berhasil dimasukkan');
    }

    public function patch(Request $r, $id){
        $cart = session()->get('daftarBarang'.$id);
       
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

        Entry::where('id',$id)->update($validated);

        $r->session()->forget('daftarBarang'.$id);
        return redirect('/pembukuan')->with('Message', 'Berhasil diedit');
    }
}
