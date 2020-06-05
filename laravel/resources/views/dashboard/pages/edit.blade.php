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
            {{ __('dashboard.EditPageTitle') }}
        </div>
        <form class="form" action="{{ route('dashboard.pages.edit', $page->id) }}" method="post">
            @csrf

            <input type="hidden" name="id" value="{{ $page->id }}">

            <div class="input">
                <label class="input__label" for="title">{{ __('dashboard.Title') }}</label>
                <input class="input__field" value="{{ $page->title }}" type="text" name="title" id="title" placeholder="{{ __('dashboard.Title') }}" required>
            </div>
            <div class="input input--limit">
                <label class="input__label" for="active">{{ __('dashboard.Active') }}</label>
                <select class="input__select" name="active" id="active" required>
                    <option class="input__option" @if ($page->active) selected @endif value="1">{{ __('dashboard.Visible') }}</option>
                    <option class="input__option" @if (!$page->active) selected @endif value="0">{{ __('dashboard.Invisible') }}</option>
                </select>
                <div class="input__moneyContainer">
                </div>
            </div>
            <div class="input">
                <label class="input__label" for="template">{{ __('dashboard.Template') }}</label>
                <input class="input__field" value="{{ $page->template }}" type="text" name="template" id="template" placeholder="{{ __('dashboard.Template') }}" required>
            </div>
            <div class="input input--fullWidth">
                <label class="input__label" for="intro">{{ __('dashboard.Intro') }}</label>
                <textarea class="input__field input__field--area" name="intro" id="intro" required>{{ $page->intro }}</textarea>
            </div>
            <div class="input input--fullWidth">
                <label class="input__label" for="content">{{ __('dashboard.Content') }}</label>
                <textarea class="input__field input__field--area input__field--htmlEditor" name="content" id="content">{{ $page->content }}</textarea>
            </div>

            <button class="button" type="submit">
                {{ __('dashboard.SaveButton') }}
            </button>
        </form>
    </div>
@endsection