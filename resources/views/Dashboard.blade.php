<h1>Dicky Masuk</h1><h1>Masuk</h1>
@auth
<form action="{{route('logout')}}" method="POST">
    @csrf
    <input type="submit" value="log out">
</form>
@endauth