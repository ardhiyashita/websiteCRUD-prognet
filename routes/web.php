<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\KabupatenController;
use App\Http\Controllers\ProvinsiController;
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
Route::get('/',[AnimalController::class,'first']);

Route::prefix('/animal')->group(function(){
    Route::get('/',[AnimalController::class,'index'])->name('animal-list');
    Route::get('/newanimal',[AnimalController::class,'newanimal'])->name('animal-new');
    Route::post('/savenew',[AnimalController::class,'savenewanimal'])->name('animal-savenew');
    Route::get('/{id}/detail',[AnimalController::class,'animaldetail'])->name('animal-detail');
    Route::get('/{id}/edit',[AnimalController::class,'animaledit'])->name('animal-edit');
    Route::post('/{id}/saveedit',[AnimalController::class,'saveedit'])->name('animal-saveedit');
    Route::post('/{id}/delete',[AnimalController::class,'deleteanimal'])->name('animal-delete');
});

Route::prefix('/kabupaten')->group(function(){
    Route::get('/',[KabupatenController::class,'index'])->name('kab-list');
    Route::get('/newkabupaten',[KabupatenController::class,'newkabupaten'])->name('kab-new');
    Route::post('/savenewkabupaten',[KabupatenController::class,'savenewkabupaten'])->name('kab-savenew');

    Route::get('/newprovinsi',[KabupatenController::class,'newprovinsi'])->name('prov-new');
    Route::post('/savenewprovinsi',[KabupatenController::class,'savenewprovinsi'])->name('prov-savenew');
    
    Route::get('/{id}/detail',[KabupatenController::class,'kabupatendetail'])->name('kab-detail');
    Route::get('/{id}/edit',[KabupatenController::class,'kabupatenedit'])->name('kab-edit');
    Route::post('/{id}/saveedit',[KabupatenController::class,'kabupatensaveedit'])->name('kab-saveedit');
    Route::post('/{id}/delete',[KabupatenController::class,'kabupatendelete'])->name('kab-delete');
});

Route::prefix('/provinsi')->group(function(){
    Route::get('/',[ProvinsiController::class,'index'])->name('provinsi-list');
    
    // ========================== ADD NEW ========================== //
    Route::get('/newprovinsi',[ProvinsiController::class,'newprovinsi'])->name('provinsi-new');
    Route::post('/savenewprovinsi',[ProvinsiController::class,'savenewprovinsi'])->name('provinsi-savenew');
    Route::get('/{id}/newkabupaten',[ProvinsiController::class,'newkabupaten'])->name('kabupaten-new');
    Route::post('/savenewkabupaten',[ProvinsiController::class,'savenewkabupaten'])->name('kabupaten-savenew');
    Route::get('/{id}/newkecamatan',[ProvinsiController::class,'newkecamatan'])->name('kecamatan-new');
    Route::post('/savenewkecamatan',[ProvinsiController::class,'savenewkecamatan'])->name('kecamatan-savenew');
    
    // ========================== DETAIL ========================== //
    Route::get('/{id}/detail/kabupaten',[ProvinsiController::class,'provinsidetailkab'])->name('provinsi-detail-kab');
    Route::get('/{id}/detail/kecamatan',[ProvinsiController::class,'provinsidetailkec'])->name('provinsi-detail-kec');

    // ========================== EDITING ========================== //
    Route::get('/{id}/edit',[ProvinsiController::class,'provinsiedit'])->name('provinsi-edit');
    Route::get('/{id}/edit/kabupaten',[ProvinsiController::class,'kabupatenedit'])->name('kabupaten-edit');
    Route::get('/{id}/edit/kecamatan',[ProvinsiController::class,'kecamatanedit'])->name('kecamatan-edit');

    Route::post('/{id}/saveedit',[ProvinsiController::class,'provinsisaveedit'])->name('provinsi-saveedit');
    Route::post('/{id}/saveedit/kabupaten',[ProvinsiController::class,'kabupatensaveedit'])->name('kabupaten-saveedit');
    Route::post('/{id}/saveedit/kecamatan',[ProvinsiController::class,'kecamatansaveedit'])->name('kecamatan-saveedit');

    // ========================== DELETE ========================== //
    Route::post('/{id}/delete',[ProvinsiController::class,'provinsidelete'])->name('provinsi-delete');
    Route::post('/{id}/delete/kabupaten',[ProvinsiController::class,'kabupatendelete'])->name('kabupaten-delete');
    Route::post('/{id}/delete/kecamatan',[ProvinsiController::class,'kecamatandelete'])->name('kecamatan-delete');
});
// provinsi bisa tambahin
// tambah kabupaten -> milih provinsi