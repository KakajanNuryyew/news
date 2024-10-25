<nav class="navbar navbar-expand-md navbar-light bg-white header">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <h2>MyNews</h2>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item me-2">
                            <a class="nav-link" href="{{ route('login') }}">Войти</a>
                        </li>
                    @endif

                @else
                    <li class="nav-item me-2">
                        <a class="nav-link" href="{{ route('my.password') }}">{{ Auth::user()->login }}</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>