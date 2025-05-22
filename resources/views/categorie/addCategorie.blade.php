@extends('welcome')

@section('content')
<form action="{{route('saveCategorie')}}" method="post">
    @method('post')
    @csrf
    <label for="">Libelle</label>
    <input type="text" name="libelle" class="form-control">

    <button type="submit" class="btn btn-success">Save</button>
</form>
@endsection
