<?php

use App\Http\Controllers\DaftarBarangEdit;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\DaftarBarangController;
use App\Http\Controllers\DaftarBarangEditController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/product',[ProductController::class, 'index'])->name('product.list');
Route::get('/productAddForm', [ProductController::class, 'tampilFormTambah'])->name('product.form.tambah');
Route::post('/product',[ProductController::class, 'store'])->name('product.store');
Route::get('/productEditForm/{id}', [ProductController::class, 'tampilFormEdit'])->name('product.form.edit');
Route::patch('/product/{id}',[ProductController::class, 'patch'])->name('product.patch');
Route::delete('/product/{id}',[ProductController::class, 'delete'])->name('product.delete');

Route::get('/unit',[UnitController::class, 'index'])->name('unit.list');
Route::post('/unit',[UnitController::class, 'store'])->name('unit.store');
Route::patch('/unit/{id}',[UnitController::class, 'patch'])->name('unit.patch');
Route::delete('/unit/{id}',[UnitController::class, 'delete'])->name('unit.delete');

Route::get('/category',[CategoryController::class, 'index'])->name('category.list');
Route::post('/category',[CategoryController::class, 'store'])->name('category.store');
Route::patch('/category/{id}',[CategoryController::class, 'patch'])->name('category.patch');
Route::delete('/category/{id}',[CategoryController::class, 'delete'])->name('category.delete');

Route::get('/income',[IncomeController::class, 'index'])->name('income.list');
Route::delete('/income/{id}',[IncomeController::class, 'delete'])->name('income.delete');
Route::get('/incomeAddForm',[IncomeController::class, 'formAddPemasukan'])->name('income.form.tambah');
Route::get('/addBarang/{id}',[DaftarBarangController::class,'addToDaftarBarang'])->name('addBarang');
Route::delete('/deleteBarang',[DaftarBarangController::class, 'remove'])->name('removeBarang');
Route::patch('/editBarang', [DaftarBarangController::class, 'update'])->name('editBarang');
Route::post('/income',[IncomeController::class, 'store'])->name('income.store');

Route::get('/income/{id}',[IncomeController::class,'formEditPemasukan'])->name('income.form.edit');
Route::get('/addDaftarBarang/{id}', [DaftarBarangEditController::class, 'addToDaftarBarang'])->name('income.edit.addBarang');
Route::delete('/deleteDaftarBarang',[DaftarBarangEditController::class, 'removeFromDaftarBarang'])->name('income.edit.removeBarang');
Route::patch('/editDaftarBarang', [DaftarBarangEditController::class, 'updateFromDaftarBarang'])->name('income.edit.patchBarang');
Route::patch('/income/{id}', [IncomeController::class, 'patch'])->name('income.patch');

require __DIR__.'/auth.php';
