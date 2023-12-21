
@include('layouts.base')
    <title>Authentication</title>

    <body>
        <div id="vue">

            <!-- Header -->
            <div class="fixed-header ">
                <a href="{{ url('/') }}" class="btn btn-primary">&#8592;Back to Main</a>
                @include('layouts.header')
            </div>

            <!-- Login/Registration Form -->
            <main class="py-4">
                @yield('auth-section')
            </main>

        </div>
    </body>
