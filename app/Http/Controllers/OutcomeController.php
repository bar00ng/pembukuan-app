<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Entry;
use Carbon\Carbon;

class OutcomeController extends Controller
{
    public function store(Request $r) {
        $cart = session()->get('daftarPengeluaran');
       
        $validated = $r->validate([
            'hargaModal' => 'required',
        ]);
        if (!empty($r->input('description'))) {
            $validated['description'] = $r->description;
        }
        if (session('daftarPengeluaran')) {
            $validated['details'] = $cart;
        }
        $validated['status'] = $r->status;
        $validated['isPemasukan'] = 0;
        $validated['totalPemasukan'] = 0;
        $validated['keuntungan'] = 0;

        Entry::create($validated);

        session()->forget('daftarPengeluaran');
        return redirect('/pembukuan')->with('Message', 'Berhasil dimasukkan');
    }

    public function patch(Request $r, $id) {
        $cart = session()->get('editDaftarPengeluaran');
       
        $validated = $r->validate([
            'totalPengeluaran' => 'required',
        ]);
        if (!empty($r->input('description'))) {
            $validated['description'] = $r->description;
        }
        if (session('editDaftarPengeluaran')) {
            $validated['details'] = $cart;
        }
        $validated['status'] = $r->status;

        Entry::where('id',$id)->update($validated);

        $r->session()->forget('editDaftarPengeluaran');
        return redirect('/pembukuan')->with('Message', 'Berhasil diedit');
    }
}
