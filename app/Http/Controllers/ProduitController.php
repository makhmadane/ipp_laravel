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
        $produits = Produit::Paginate(10);
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
        $produit = new Produit();
        return  view('produit.addProduit',compact('categories','produit'));
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
           // 'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if($request->file('photo')){
            $path = $request->file('photo')->store('images','public');
        }

        $produit = new \App\Models\Produit();
        $produit->libelle = $request->libelle;
        $produit->prix = $request->prix;
        $produit->qt = $request->qt;
        $produit->description = $request->description;
        $produit->categorie_id = $request->categorie_id;
        $produit->photo = $path;
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
        $produit = Produit::find($id);
        $categories = \App\Models\Categorie::all();
        return  view('produit.addProduit',compact('categories','produit'));
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
        $request->validate([
            'libelle' => 'required|max:30',
            'prix' => 'required|numeric|min:0|max:10000',
            'qt' => 'required',
        ]);
        $produit = Produit::find($id);
        $produit->update($request->all());

        return redirect('produit')->with("message", "Produit modifier avec succes");

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
