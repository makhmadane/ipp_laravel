<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $produits = Produit::all();
        $produits = Produit::Paginate(2);
        return view('produit.produit',compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = \App\Models\Categorie::all();
        return  view('produit.addProduit',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'libelle' => 'required|max:30',
            'prix' => 'required|numeric|min:0|max:10000',
            'qt' => 'required',
        ]);

        $produit = new \App\Models\Produit();
        $produit->libelle = $request->libelle;
        $produit->prix = $request->prix;
        $produit->qt = $request->qt;
        $produit->description = $request->description;
        $produit->categorie_id = $request->categorie_id;
        $produit->save();

        return  redirect('produit')->with("message", "Produit ajout avec succes");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Produit::destroy($id);

        return redirect("produit")->with("messageDelete", "Produit supprime avec succes");
    }
}
