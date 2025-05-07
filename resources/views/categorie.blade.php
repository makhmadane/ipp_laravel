<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<a href="{{route('addCategorie')}}" >Add</a>
    <table>
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
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>


</body>
</html>
