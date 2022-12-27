<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class DaftarBarangController extends Controller
{
    // Form Tambah Pemasukan | SESSION_NAME = cart
    // Form Edit Pemasukan | SESSION_NAME = daftarBarang
    // Form Tambah Pengeluaran | SESSION_NAME = daftarPengeluaran
    // Form Edit Pengeluaran | SESSION_NAME = editDaftarPengeluaran
    public function addToSession($sessionName, $id) {
        $product = Product::findOrFail($id);

        $cart = session()->get($sessionName,[]);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $product->productName,
                'quantity' => 1,
                'price' => $product->productPrice,
                'modal' => $product->productModal
            ];
        }

        session()->put($sessionName,$cart);
        return back();
    }

    public function updateFromSession(Request $r, $sessionName) {
        if($r->id && $r->quantity){
            $cart = session()->get($sessionName);

            $cart[$r->id]["quantity"] = $r->quantity;
            session()->put($sessionName,$cart);
            session()->flash('Message', 'Berhasil diubah');
        }
    }

    public function removeFromSession(Request $r, $sessionName) {
        if($r->id) {
            $cart = session()->get($sessionName);
            if(isset($cart[$r->id])) {
                unset($cart[$r->id]);
                session()->put($sessionName, $cart);
            }
            session()->flash('Message', 'Berhasil dihapus');
        }
    }
}
