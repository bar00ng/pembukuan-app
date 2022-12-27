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

        $pembukuan = Entry::orderBy('created_at')
            ->get()
            ->groupBy(function ($val) {
                return Carbon::parse($val->created_at)->format('M Y');
            });

        $months = [];
        $pemasukan = [];
        $pengeluaran = [];

        foreach($pembukuan as $month => $values){
            $months[] = $month;
            foreach($values as $d){
                $val_pemasukan = 0;
                $val_pengeluaran = 0;
                $val_pemasukan += $d['totalPemasukan'];
                $val_pengeluaran += $d['hargaModal'];
            }
            $pemasukan[] = $val_pemasukan;
            $pengeluaran[] = $val_pengeluaran;
        }

        $chart = new Pembukuan;

        $chart->labels($months);
        $chart->dataset('Pemasukan', 'bar', $pemasukan)->backgroundColor('#046c4e');
        $chart->dataset('Pengeluaran', 'bar', $pengeluaran)->backgroundColor('#c81e1e');
        
        return view('listPembukuan',[
            'data' => $data,
            'chart' => $chart
        ]);
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
