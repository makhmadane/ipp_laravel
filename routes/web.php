<?php

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

Route::get('/ipp', function () {
    //return view('welcome');

    //creation Eloquent
   /*

    //List all
    /*$categories = \App\Models\Categorie::all();
    foreach ($categories as $c){
        echo $c->id . " ". $c->libelle;
    }*/

    //find by id
    /*$categorie = \App\Models\Categorie::find(1);
    echo $categorie->id . " ". $categorie->libelle;*/

    //suppression
    /*$categorie = \App\Models\Categorie::find(1);
    $categorie->delete();*/

    //Mettre à jour
    $categorie = \App\Models\Categorie::find(2);
    $categorie->libelle = "Aliment";
    $categorie->save();

});

Route::get('/categorie',[\App\Http\Controllers\CategorieController::class,'index']);
Route::get('/addCategorie',[\App\Http\Controllers\CategorieController::class,'create'])->name('addCategorie');
Route::post('/saveCategorie',[\App\Http\Controllers\CategorieController::class,'store'])->name('saveCategorie');
Route::delete('/deleteCategorie/{id}',[\App\Http\Controllers\CategorieController::class,'destroy'])->name('deleteCategorie');;
