<form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            Email: <input type="email" name="email">
        </div>

        <div>
            Password: <input type="password" name="password">
        </div>
        
        <button type="submit">Login</button>
    </form>
