@extends('welcome')


@section('content')

<form action="{{route('saveProduit')}}" method="post">
    @method('post')
    @csrf
    <label for="">Libelle</label>
    <input type="text" name="libelle" class="form-control">
    @error('libelle')
       <span class="text-danger">  {{$message}}</span> <br>
    @enderror
    <label for="">Prix</label>
    <input type="number" name="prix" class="form-control">
    @error('prix')
        <span class="text-danger">  {{$message}}</span> <br>
    @enderror
    <label for="">Quantite</label>
    <input type="text" name="qt" class="form-control">
    @error('qt')
        <span class="text-danger">  {{$message}}</span> <br>
    @enderror
    <label for="">Description</label>
    <input type="text" name="description" class="form-control">
    <select name="categorie_id" class="form-control">
        @foreach($categories as $c)
            <option value="{{$c->id}}" >{{$c->libelle}}</option>
        @endforeach
    </select>
    <button type="submit" class="btn btn-success">Save</button>
</form>
@endsection
