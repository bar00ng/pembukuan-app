<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::get();

        return view('kategori.listKategori', ['categories' => $categories]);
    }

    public function formTambahCategory() {
        return view('kategori.formTambahKategori');
    }

    public function store(Request $r) {
        $validated = $r->validate([
            'categoryName' => 'required',
        ]);

        $product = Category::create($validated);

        return redirect('/category')->with('Message', 'Berhasil ditambahkan');
    }

    public function formEditCategory($id) {
        $category = Category::where('id', $id)->first();

        return view('kategori.formEditKategori', ['category' => $category]);
    }

    public function patch(Request $r, $id) {
        $validated = $r->validate([
            'categoryName' => 'required',
        ]);

        $category = Category::where('id',$id)->update($validated);

        return redirect('/category')->with('Message', 'Berhasil diedit');
    }

    public function delete($id){
        Category::where('id',$id)->delete();

        return redirect('/category')->with('Message', 'Berhasil dihapus');
    }
}
