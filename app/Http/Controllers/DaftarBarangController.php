<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class DaftarBarangController extends Controller
{
    // Form Tambah Pemasukan | SESSION_NAME = cart
    public function addToFormTambahPemasukan($id) {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart',[]);

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

        session()->put('cart',$cart);
        return redirect('/incomeAddForm')->with('Message', 'Berhasil dimasukkan ke Cart');
    }

    public function updateFromFormTambahPemasukan(Request $r) {
        if($r->id && $r->quantity){
            $cart = session()->get('cart');

            $cart[$r->id]["quantity"] = $r->quantity;
            session()->put('cart',$cart);
            session()->flash('Message', 'Berhasil diubah');
        }
    }

    public function removeFromFormTambahPemasukan(Request $r) {
        if($r->id) {
            $cart = session()->get('cart');
            if(isset($cart[$r->id])) {
                unset($cart[$r->id]);
                session()->put('cart', $cart);
            }
            session()->flash('Message', 'Berhasil dihapus');
        }
    }


    // Form Edit Pemasukan | SESSION_NAME = daftarBarang
    public function addToFormEditPemasukan($id) {
        $product = Product::findOrFail($id);

        $cart = session()->get('daftarBarang',[]);

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
       
        session()->put('daftarBarang',$cart);
        return back();
    }

    public function removeFromFormEditPemasukan(Request $r) {
        if($r->id) {
            $cart = session()->get('daftarBarang');
            if(isset($cart[$r->id])) {
                unset($cart[$r->id]);
                session()->put('daftarBarang', $cart);
            }
            session()->flash('Message', 'Berhasil dihapus');
        }
    }

    public function updateFromFormEditPemasukan(Request $r) {
        if($r->id && $r->quantity){
            $cart = session()->get('daftarBarang');

            $cart[$r->id]["quantity"] = $r->quantity;
            session()->put('daftarBarang',$cart);
            session()->flash('Message', 'Berhasil diubah');
        }
    }

    // Form Tambah Pengeluaran | SESSION_NAME = daftarPengeluaran
    public function addToFormTambahPengeluaran($id) {
        $product = Product::findOrFail($id);

        $cart = session()->get('daftarPengeluaran',[]);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $product->productName,
                'quantity' => 1,
                'price' => $product->productPrice,
            ];
        }

        session()->put('daftarPengeluaran',$cart);
        return redirect('/outcomeAddForm')->with('Message', 'Berhasil dimasukkan ke Cart');
    }

    public function updateFromFormTambahPengeluaran(Request $r) {
        if($r->id && $r->quantity){
            $cart = session()->get('daftarPengeluaran');

            $cart[$r->id]["quantity"] = $r->quantity;
            session()->put('daftarPengeluaran',$cart);
            session()->flash('Message', 'Berhasil diubah');
        }
    }

    public function removeFromFormTambahPengeluaran(Request $r) {
        if($r->id) {
            $cart = session()->get('daftarPengeluaran');
            if(isset($cart[$r->id])) {
                unset($cart[$r->id]);
                session()->put('daftarPengeluaran', $cart);
            }
            session()->flash('Message', 'Berhasil dihapus');
        }
    }

    
    // Form Edit Pengeluaran | SESSION_NAME = editDaftarPengeluaran
    public function addToFormEditPengeluaran($id) {
        $product = Product::findOrFail($id);

        $cart = session()->get('editDaftarPengeluaran',[]);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $product->productName,
                'quantity' => 1,
                'price' => $product->productPrice,
            ];
        }
       
        session()->put('editDaftarPengeluaran',$cart);
        return back();
    }

    public function removeFromFormEditPengeluaran(Request $r) {
        if($r->id) {
            $cart = session()->get('editDaftarPengeluaran');
            if(isset($cart[$r->id])) {
                unset($cart[$r->id]);
                session()->put('editDaftarPengeluaran', $cart);
            }
            session()->flash('Message', 'Berhasil dihapus');
        }
    }

    public function updateFromFormEditPengeluaran(Request $r) {
        if($r->id && $r->quantity){
            $cart = session()->get('editDaftarPengeluaran');

            $cart[$r->id]["quantity"] = $r->quantity;
            session()->put('editDaftarPengeluaran',$cart);
            session()->flash('Message', 'Berhasil diubah');
        }
    }
}
