
    <nav class="fixed-header ">
        <img class="logo" src="{{asset('./logo.png')}}" alt="Logo">
        <h1 >Post Maker</h1>
            @if(Auth::check())
                <div class="header-buttons">
                    <h4 >Welcome {{ Auth::user()->name }}</h4>
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

    </nav>
