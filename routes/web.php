<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
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

    Route::get('/categorie',[\App\Http\Controllers\CategorieController::class,'index'])->name('categorie');;
    Route::get('/addCategorie',[\App\Http\Controllers\CategorieController::class,'create'])->name('addCategorie');
    Route::post('/saveCategorie',[\App\Http\Controllers\CategorieController::class,'store'])->name('saveCategorie');
    Route::delete('/deleteCategorie/{id}',[\App\Http\Controllers\CategorieController::class,'destroy'])->name('deleteCategorie');;

    Route::get('/produit',[\App\Http\Controllers\ProduitController::class,'index'])->name('produit');;
    Route::get('/addProduit',[\App\Http\Controllers\ProduitController::class,'create'])->name('addProduit');
    Route::post('/saveProduit',[\App\Http\Controllers\ProduitController::class,'store'])->name('saveProduit');
    Route::delete('/deleteProduit/{id}',[\App\Http\Controllers\ProduitController::class,'destroy'])->name('deleteProduit');;
    Route::get('/editProduit/{id}',[\App\Http\Controllers\ProduitController::class,'edit'])->name('editProduit');
    Route::put('/updateProduit/{id}',[\App\Http\Controllers\ProduitController::class,'update'])->name('updateProduit');

});


require __DIR__.'/auth.php';
