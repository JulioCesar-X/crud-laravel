<nav class="navbar navbar-expand-md navbar-light shadow-sm p-2">

    <div class="container">
        <nav class="collapse navbar-collapse" id="navbarSupportedContent">
            <div id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" v-pre>
                Menu
            </div>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <ul>
                    <li class="dropdown-item btn-actions">
                        <a class="navbar-brand" href="{{ url('person') }}">
                            <b class="bi bi-person-plus-fill">
                                Person list
                            </b>
                        </a>
                    </li>
                    <li class="dropdown-item btn-actions">
                        <a class="navbar-brand" href="{{ url('bicycle') }}">
                            <b class="bi bi-bicycle">
                                Bicycles list
                            </b>
                        </a>
                    </li>
                    <li class="dropdown-item btn-actions">
                        <a class="navbar-brand" href="{{ url('country') }}">
                            <b class="bi bi-flag-fill">
                                Country list
                            </b>
                        </a>
                    </li>
                    <li class="dropdown-item btn-actions">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            {{ config('app.name'), 'Laravel' }}
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        @switch(url()->current())
            @case(url('person'))
                <a class="navbar-brand btn-actions" href="{{ url('person/create') }}">
                    Add Person
                </a>
            @break

            @case(url('bicycle'))
                <a class="navbar-brand btn-actions" href="{{ url('bicycle/create') }}">
                    Add Bicycle
                </a>
            @break

            @case(url('country'))
                <a class="navbar-brand btn-actions" href="{{ url('country/create') }}">
                    Add Country
                </a>
            @break

            @default
                <a class="navbar-brand btn-actions" href="{{ url('person/create') }}">
                   Add Person
                </a>
                <a class="navbar-brand btn-actions" href="{{ url('bicycle/create') }}">
                    Add Bicycle
                </a>
                <a class="navbar-brand btn-actions" href="{{ url('country/create') }}">
                    Add Country
                </a>
        @endswitch
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto"></ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">

                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
