
@extends('layouts.base')
<html>

    <title>Authentication</title>

    <body>
        <header>
            <!-- Header -->
            <div class="fixed-header ">
                <a href="{{ url('/') }}" class="btn btn-primary">&#8592;Back to Main</a>
            </div>
        </header>
            <!-- Login/Registration Form -->
            <main class="py-4">
                @yield('auth-section')
            </main>
    </body>
</html>
