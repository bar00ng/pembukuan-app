<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class DaftarBarangController extends Controller
{
    public function addToDaftarBarang($id) {
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

    public function update(Request $r) {
        if($r->id && $r->quantity){
            $cart = session()->get('cart');

            $cart[$r->id]["quantity"] = $r->quantity;
            session()->put('cart',$cart);
            session()->flash('Message', 'Berhasil diubah');
        }
    }

    public function remove(Request $r) {
        if($r->id) {
            $cart = session()->get('cart');
            if(isset($cart[$r->id])) {
                unset($cart[$r->id]);
                session()->put('cart', $cart);
            }
            session()->flash('Message', 'Berhasil dihapus');
        }
    }
}
