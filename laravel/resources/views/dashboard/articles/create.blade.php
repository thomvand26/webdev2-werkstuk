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
            {{ __('dashboard.CreateArticleTitle') }}
        </div>
        <form class="form" action="{{ route('dashboard.articles.create.post') }}" method="post" enctype="multipart/form-data">
            @csrf
            
            <div class="input">
                <label class="input__label" for="image">{{ __('dashboard.Image') }}</label>
                <input class="input__image" type="file" name="image" id="image" required>
            </div>
            <div class="input">
                <label class="input__label" for="title">{{ __('dashboard.Title') }}</label>
                <input class="input__field" type="text" name="title" id="title" placeholder="{{ __('dashboard.Title') }}" required>
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