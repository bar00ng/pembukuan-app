<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Entry;
use Carbon\Carbon;
use App\Charts\Pembukuan;

class PembukuanController extends Controller
{
    public function index() {
        $data = Entry::orderBy('created_at', 'DESC')
            ->get()
            ->groupBy(function ($val) {
                return Carbon::parse($val->created_at)->format('d M Y');
            });

        $pembukuan = Entry::orderBy('created_at', 'DESC')
            ->get()
            ->groupBy(function ($val) {
                return Carbon::parse($val->created_at)->format('M Y');
            });

        $months = [];
        foreach($pembukuan as $month => $values){
            $months[] = $month;
        }

        $chart = new Pembukuan;

        $chart->labels($months);
        
        return dd($months);
    }

    public function delete($id){
        Entry::where('id', $id)->delete();

        return redirect('/pembukuan')->with('Message', 'Berhasil dihapus');
    }

    public function formAddPemasukan() {
        $products = Product::get();

        return view('pemasukan.formTambahPemasukan', [
            'products' => $products
        ]);
    }

    public function formAddPengeluaran() {
        $products = Product::get();

        return view('pengeluaran.formTambahPengeluaran', [
            'products' => $products
        ]);
    }

    public function formEditPemasukan($id) {
        $data = Entry::where('id', $id)->first();
        $products = Product::get();

        return view('pemasukan.formEditPemasukan', [
            'data' => $data,
            'products' => $products
        ]);
    }

    public function formEditPengeluaran($id) {
        $data = Entry::where('id', $id)->first();
        $products = Product::get();

        return view('pengeluaran.formTambahPengeluaran', [
            'data' => $data,
            'products' => $products
        ]);
    }

}
