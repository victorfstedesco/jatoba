{{  Auth::user()->name }}

<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit">Deslogar</button>
</form>