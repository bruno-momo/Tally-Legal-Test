<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Auth;

//Route::get('/', function () {
    //return view('welcome');
//});

Auth::routes();

Route::get('/', [CompanyController::class, 'create'])->name('company.create');
Route::get('/home', [CompanyController::class, 'index'])->name('companies');//->middleware('auth');

Route::get('empresas', [CompanyController::class, 'index'])->name('companies');//->middleware('auth');

Route::get('empresa/{id}', [CompanyController::class, 'show'])->name('company.show')->middleware('auth');
Route::get('agregar-empresa', [CompanyController::class, 'create'])->name('company.create');
Route::post('empresas', [CompanyController::class, 'store'])->name('company.store');
Route::get('editar-empresa/{id}', [CompanyController::class, 'edit'])->name('company.edit')->middleware('auth');
Route::put('empresas/{id}', [CompanyController::class, 'update'])->name('company.update');
Route::delete('empresas/{id}', [CompanyController::class, 'destroy'])->name('company.destroy');
