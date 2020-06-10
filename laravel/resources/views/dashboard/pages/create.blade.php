@extends('layouts.dashboard')

@section('scripts')
<script>
    tinymce.init({
      selector: '#content',
      height: '480',
    });
</script>
@endsection

@section('content')
    <div class="dashboardEditPage">
        <div class="dashboardEditPage__title">
            {{ __('dashboard.CreatePageTitle') }}
        </div>
        <form class="form" action="{{ route('dashboard.pages.create.post') }}" method="post">
            @csrf

            <div class="input">
                <label class="input__label" for="title">{{ __('dashboard.Title') }}</label>
                <input class="input__field" type="text" name="title" id="title" placeholder="{{ __('dashboard.Title') }}" required>
            </div>
            <div class="input input--limit">
                <label class="input__label" for="active">{{ __('dashboard.Active') }}</label>
                <select class="input__select" name="active" id="active" required>
                    <option class="input__option" value="1">{{ __('dashboard.Visible') }}</option>
                    <option class="input__option" value="0">{{ __('dashboard.Invisible') }}</option>
                </select>
                <div class="input__moneyContainer">
                </div>
            </div>
            <div class="input">
                <label class="input__label" for="order">{{ __('dashboard.Order') }}</label>
                <input class="input__field" type="number" name="order" id="order" min="0" required>
            </div>
            <div class="input">
                <label class="input__label" for="template">{{ __('dashboard.Template') }}</label>
                <input class="input__field" type="text" name="template" id="template" placeholder="{{ __('dashboard.Template') }}" required>
            </div>
            <div class="input input--fullWidth">
                <label class="input__label" for="intro">{{ __('dashboard.Intro') }}</label>
                <textarea class="input__field input__field--area" name="intro" id="intro" required></textarea>
            </div>
            <div class="input input--fullWidth">
                <label class="input__label" for="content">{{ __('dashboard.Content') }}</label>
                <textarea class="input__field input__field--area input__field--htmlEditor" name="content" id="content"></textarea>
            </div>

            <button class="button" type="submit">
                {{ __('dashboard.SaveButton') }}
            </button>
        </form>
    </div>
@endsection