
@extends('welcome')

@section('content')
<div class="container">
    <a href="{{route('addCategorie')}}" class="btn btn-success" >Add</a>
    <br>
    <table class="table table-bordered mt-5">
        <tr>
            <td>Id</td>
            <td>Libelle</td>
            <td>Actions</td>
        </tr>
        @foreach($categories as $c)
            <tr>
                <td>{{$c->id}}</td>
                <td>{{$c->libelle}}</td>
                <td>
                    <form action="{{route('deleteCategorie',$c->id)}}" method="post">
                        @method("delete")
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

</div>
@endsection

