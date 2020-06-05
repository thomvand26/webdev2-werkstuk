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
        {{ __('dashboard.EditArticleTitle') }}
    </div>
    <form class="form" action="{{ route('dashboard.articles.edit', $article->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        
        <input type="hidden" name="id" value="{{$article->id}}">

        <div class="input">
            <label class="input__label" for="image">{{ __('dashboard.Image') }}</label>
            <input class="input__image" type="file" name="image" id="image" required>
        </div>
        <div class="input">
            <label class="input__label" for="title">{{ __('dashboard.Title') }}</label>
            <input class="input__field" value="{{ $article->title }}" type="text" name="title" id="title" placeholder="{{ __('dashboard.Title') }}" required>
        </div>
        <div class="input input--fullWidth">
            <label class="input__label" for="intro">{{ __('dashboard.Intro') }}</label>
            <textarea class="input__field input__field--area" name="intro" id="intro" required>{{ $article->intro }}</textarea>
        </div>
        <div class="input input--fullWidth">
            <label class="input__label" for="content">{{ __('dashboard.Content') }}</label>
            <textarea class="input__field input__field--area input__field--htmlEditor" name="content" id="content">{{ $article->content }}</textarea>
        </div>

        <button class="button" type="submit">
            {{ __('dashboard.SaveButton') }}
        </button>
    </form>
</div>
@endsection