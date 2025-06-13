@extends('welcome')


@section('content')

<form action="{{route($produit->id ? 'updateProduit' : 'saveProduit',$produit->id)}}" method="post" enctype="multipart/form-data">
    @method($produit->id ? 'put' :'post')
    @csrf
    <label for="">Photo </label>
    <input type="file" name="photo" class="form-control" id="" value="{{$produit->photo}}">

    <label for="">Libelle</label>
    <input type="text" name="libelle" class="form-control" value="{{$produit->id ? $produit->libelle : old('libelle')}}">
    @error('libelle')
       <span class="text-danger">  {{$message}}</span> <br>
    @enderror
    <label for="">Prix</label>
    <input type="number" name="prix" class="form-control" value="{{$produit->id ?$produit->prix : old('prix')}}">
    @error('prix')
        <span class="text-danger">  {{$message}}</span> <br>
    @enderror
    <label for="">Quantite</label>
    <input type="text" name="qt" class="form-control" value="{{$produit->id ?$produit->qt : old('qt')}}">
    @error('qt')
        <span class="text-danger">  {{$message}}</span> <br>
    @enderror
    <label for="">Description</label>
    <input type="text" name="description" class="form-control" value="{{$produit->id ?$produit->description : old('description')}}">

    <label for="">Categorie</label>
    <select name="categorie_id" class="form-control">
        @foreach($categories as $c)
            <option @if($c->id == $produit->categorie_id) selected @endif value="{{$c->id}}" >{{$c->libelle}}</option>
        @endforeach
    </select>
    <button type="submit" class="btn btn-success">{{$produit->id ? 'Update' : 'Save'}}</button>
</form>
@endsection
