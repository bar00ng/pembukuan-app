<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Outcome;
use Carbon\Carbon;

class OutcomeController extends Controller
{
    public function index() {
        $outcomes = Outcome::orderBy('created_at','DESC')
                    ->get()
                    ->groupBy(function ($val){
                        return Carbon::parse($val->created_at)->format('d M Y');
                    });
        
        return view('pengeluaran.listPengeluaran', compact('outcomes'));
    }

    public function store(Request $r) {
        $cart = session()->get('daftarPengeluaran');
       
        $validated = $r->validate([
            'totalPengeluaran' => 'required',
        ]);
        if (!empty($r->input('description'))) {
            $validated['description'] = $r->description;
        }
        if (session('cart')) {
            $validated['details'] = $cart;
        }
        $validated['status'] = $r->status;

        Outcome::create($validated);

        $r->session()->forget('daftarPengeluaran');
        return redirect('/outcome')->with('Message', 'Berhasil dimasukkan');
    }

    public function delete($id) {
        Outcome::where('id',$id)->delete();

        return redirect('/outcome')->with('Message', 'Berhasil dihapus');
    }

    public function patch(Request $r, $id) {
        $cart = session()->get('editDaftarPengeluaran');
       
        $validated = $r->validate([
            'totalPengeluaran' => 'required',
        ]);
        if (!empty($r->input('description'))) {
            $validated['description'] = $r->description;
        }
        if (session('cart')) {
            $validated['details'] = $cart;
        }
        $validated['status'] = $r->status;

        outcome::where('id',$id)->update($validated);

        $r->session()->forget('editDaftarPengeluaran');
        return redirect('/outcome')->with('Message', 'Berhasil diedit');
    }

    public function formAddPengeluaran() {
        $products = Product::get();

        return view('pengeluaran.formTambahPengeluaran', ['products' => $products]);
    }

    public function formEditPengeluaran($id) {
        $products = Product::get();
        $outcome = Outcome::where('id',$id)->first();

        if (!session('editDaftarPengeluaran')) {
            $cart = session()->get('editDaftarPengeluaran',[]);

            $cart = $outcome['details'];

            session()->put('editDaftarPengeluaran', $cart);
        }
        
        return view('pengeluaran.formEditPengeluaran',[
            'outcome' => $outcome,
            'products' => $products
        ]);
    }
}
