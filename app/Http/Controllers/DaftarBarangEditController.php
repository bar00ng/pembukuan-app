<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class DaftarBarangEditController extends Controller
{
    public function addToDaftarBarang($id) {
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

    public function removeFromDaftarBarang(Request $r) {
        if($r->id) {
            $cart = session()->get('daftarBarang');
            if(isset($cart[$r->id])) {
                unset($cart[$r->id]);
                session()->put('daftarBarang', $cart);
            }
            session()->flash('Message', 'Berhasil dihapus');
        }
    }

    public function updateFromDaftarBarang(Request $r) {
        if($r->id && $r->quantity){
            $cart = session()->get('daftarBarang');

            $cart[$r->id]["quantity"] = $r->quantity;
            session()->put('daftarBarang',$cart);
            session()->flash('Message', 'Berhasil diubah');
        }
    }
}
