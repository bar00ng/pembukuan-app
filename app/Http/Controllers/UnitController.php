<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Unit;

class UnitController extends Controller
{
    public function index() {
        $units = Unit::get();

        return view('listUnit', ['units' => $unit]);
    }

    public function formTambahUnit() {
        return view('formTambahUnit');
    }

    public function store(Request $r) {
        $validated = $r->validate([
            'categoryName' => 'required'
        ]);

        $unit = Unit::create($validated);

        return redirect('/unit')->with('Message','Berhasil ditambahkan');
    }

    public function formEditUnit($id) {
        $unit = Unit::where('id',$id)->first();

        return view('formEditUnit', ['unit' => $unit]);
    }

    public function patch(Request $r, $id) {
        $validated = $r->validate([
            'categoryName' => 'required'
        ]);

        $product = Unit::where('id',$id)->update($validated);

        return redirect('/unit')->with('Message', 'Berhasil diedit');
    }

    public function delete($id) {
        Unit::where('id',$id)->delete();

        return redirect('/product')->with('Message', 'Berhasil dihapus');
    }
}
