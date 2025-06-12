@extends('welcome')

@section('content')

<a href="{{route('addProduit')}}" class="btn btn-success" >Add</a>

@if(session("message"))
<div class="alert alert-success">
    {{session("message")}}
</div>
@endif
@if(session("messageDelete"))
    <div class="alert alert-danger">
        {{session("messageDelete")}}
    </div>
@endif

    <table class="table table-bordered mt-5">
        <tr>
            <td>Photo</td>
            <td>Libelle</td>
            <td>Prix</td>
            <td>Quantite</td>
            <td>Categorie</td>
            <td>Actions</td>
        </tr>
        @foreach($produits as $c)
            <tr>
                <td>
                    @if($c->photo)
                        <img src="{{asset('storage/'.$c->photo)}}" width="90px">
                    @else
                        <img src="{{asset('storage/images/user.png')}}" width="90px">
                    @endif
                </td>
                <td>{{$c->libelle}}</td>
                <td>{{$c->prix}}</td>
                <td>{{$c->qt}}</td>
                <td>{{$c->categorie->libelle}}</td>
                <td>
                    <form action="{{route('deleteProduit',$c->id)}}" method="post">
                        @method("delete")
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>

                    <a class="btn btn-primary" href="{{route('editProduit',$c->id)}}" >Update</a>
                </td>
            </tr>
        @endforeach
    </table>

    {{$produits->links()}}
@endsection


