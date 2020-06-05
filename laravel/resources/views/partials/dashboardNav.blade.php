@section('dashboardNav')
    <nav class="navbar navbar--dashboard">
            <ul class="navbar-nav navbar-nav--dashboard">
                <li class="nav-item">
                    <a class="nav-link  @if ((Request::segment(2) ?? null) == 'pages')nav-link--selected @endif" href="{{ route('dashboard.pages.index') }}">{{ __('dashboard.Pages') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  @if ((Request::segment(2) ?? null) == 'articles')nav-link--selected @endif" href="{{ route('dashboard.articles.index') }}">{{ __('dashboard.Articles') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  @if ((Request::segment(2) ?? null) == 'donations')nav-link--selected @endif" href="{{ route('dashboard.donations.index') }}">{{ __('dashboard.Donations') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  @if ((Request::segment(2) ?? null) == 'apikeys')nav-link--selected @endif" href="{{ route('dashboard.apikeys.index') }}">{{ __('dashboard.API Keys') }}</a>
                </li>
            </ul>
    </nav>
@endsection
