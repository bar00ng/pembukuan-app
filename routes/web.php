<?php

use App\Http\Controllers\DaftarBarangEdit;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\OutcomeController;
use App\Http\Controllers\DaftarBarangController;
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
Route::post('/income',[IncomeController::class, 'store'])->name('income.store');
Route::get('/income/{id}',[IncomeController::class,'formEditPemasukan'])->name('income.form.edit');
Route::patch('/income/{id}', [IncomeController::class, 'patch'])->name('income.patch');

Route::get('/outcome',[OutcomeController::class, 'index'])->name('outcome.list');
Route::delete('/outcome/{id}',[OutcomeController::class, 'delete'])->name('outcome.delete');
Route::get('/outcomeAddForm',[OutcomeController::class, 'formAddPengeluaran'])->name('outcome.form.tambah');
Route::post('/outcome',[OutcomeController::class, 'store'])->name('outcome.store');
Route::get('/outcome/{id}',[OutcomeController::class,'formEditPengeluaran'])->name('outcome.form.edit');
Route::patch('/outcome/{id}', [OutcomeController::class, 'patch'])->name('outcome.patch');

Route::get('/addBarang/{id}',[DaftarBarangController::class,'addToFormTambahPemasukan'])->name('addBarang');
Route::delete('/deleteBarang',[DaftarBarangController::class, 'removeFromFormTambahPemasukan'])->name('removeBarang');
Route::patch('/editBarang', [DaftarBarangController::class, 'updateFromFormTambahPemasukan'])->name('editBarang');

Route::get('/outcomeAddBarang/{id}',[DaftarBarangController::class,'addToFormTambahPengeluaran'])->name('outcomeAddBarang');
Route::delete('/outcomeDeleteBarang',[DaftarBarangController::class, 'removeFromFormTambahPengeluaran'])->name('outcomeRemoveBarang');
Route::patch('/outcomeEditBarang', [DaftarBarangController::class, 'updateFromFormTambahPengeluaran'])->name('outcomeEditBarang');

Route::get('/addDaftarBarang/{id}', [DaftarBarangController::class, 'addToFormEditPemasukan'])->name('income.edit.addBarang');
Route::delete('/deleteDaftarBarang',[DaftarBarangController::class, 'removeFromFormEditPemasukan'])->name('income.edit.removeBarang');
Route::patch('/editDaftarBarang', [DaftarBarangController::class, 'updateFromFormEditPemasukan'])->name('income.edit.patchBarang');

Route::get('/outcomeAddDaftarBarang/{id}', [DaftarBarangController::class, 'addToFormEditPengeluaran'])->name('outcome.edit.addBarang');
Route::delete('/outcomeDeleteDaftarBarang',[DaftarBarangController::class, 'removeFromFormEditPengeluaran'])->name('outcome.edit.removeBarang');
Route::patch('/outcomeEditDaftarBarang', [DaftarBarangController::class, 'updateFromFormEditPengeluaran'])->name('outcome.edit.patchBarang');

require __DIR__.'/auth.php';
