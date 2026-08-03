<form method="POST" action="{{ route('register') }}">
        @csrf

        Nome: <input type="text" name="name">
        Email: <input type="email" name="email">
        Senha: <input type="password" name="password">
        Confirme a Senha: <input type="password" name="password_confirmation">
        {{$errors}}
        <button type="submit">Registrar</button>
</form>
