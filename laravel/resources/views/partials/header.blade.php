@section('header')
    <nav class="navbar navbar-expand-xl">
        <div class="container container--header">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Home') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon fas fa-bars"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                {{-- All Links --}}
                <ul class="navbar-nav navbar--center">
                    <li class="nav-item">
                        <a class="nav-link @if ((Request::segment(1) ?? null) == 'news')nav-link--selected @endif" href="{{ route('news') }}">{{ __('pages.News') }}</a>
                    </li>
                    @foreach ($pages as $page)
                        <li class="nav-item">
                            <a class="nav-link @if ((Request::segment(1) ?? null) == $page->slug)nav-link--selected @endif" href="{{ '/' . $page->slug }}">{{ Lang::has('pages.' . $page->title, App::getLocale()) ? __('pages.' . $page->title) : $page->title }}</a>
                        </li>
                    @endforeach
                    @guest
                    @else
                    <li class="nav-item">
                        <a class="nav-link @if ((Request::segment(1) ?? null) == 'dashboard')nav-link--selected @endif" href="{{ route('dashboard.pages.index') }}">Dashboard</a>
                    </li>
                    @endguest
                </ul>

                
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto navbar__right">
                    <a href="{{ route('donations.index') }}" class="button button--donate">{{ __('pages.Donate') }}</a>
                    <form action="{{ route('locale') }}" method="post" name="localeForm">
                        @csrf

                        <select class="input input__select" name="locale" id="locale" onchange="localeForm.submit();" >
                            <option class="input input__option" value="en" @if (App::isLocale('en')) selected @endif>EN</option>
                            <option class="input input__option" value="nl" @if (App::isLocale('nl')) selected @endif>NL</option>
                        </select>
                    </form>


                    <!-- Authentication Links -->
                    @guest
                    @else
                    <div class="nav-item nav-link--logout">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
@endsection
