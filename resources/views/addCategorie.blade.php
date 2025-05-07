<form action="{{route('saveCategorie')}}" method="post">
    @method('post')
    @csrf
    <label for="">Libelle</label>
    <input type="text" name="libelle">

    <button type="submit">Save</button>
</form>
