
    <h1 >Share a Post</h1>

        @if(Auth::check())
            <p>You are logged in as: {{ Auth::user()->name }}</p>
            <div class="header-buttons ">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Logout</button>
                </form>
            </div>
        @else
            <div class="header-buttons">
                <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
            </div>
        @endif
