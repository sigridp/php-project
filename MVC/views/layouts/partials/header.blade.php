<header>
<div id="app">
    <nav class="navbar-navbar navbar-expand-md navbar-light navbar-laravel-md nav">
        <div class="container">
            <div class="row">
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <a class="nav-link" href="{{ route('login')}}">Login</a>
                        <a class="nav-link" href="{{ route('register')}}">Register</a>
                    @else
                        <div class="dropdown">
                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}<span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="/profile">Your Profile</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                    <form id="logout-form" action="{{ route('logout')}}" method="post" style="display:none;">{{csrf_field()}}</form>
                                </li>
                            </ul>
                        </div>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</div>

@include('layouts.partials.nav')
</header>
