@extends('layouts.app')

@section('content')
    <h1 class="pageTitle">{{ __('pages.' . $page->title) }}</h1>

    <blockquote style="font-style: italic;">
        {{ $page->intro }}
    </blockquote>

    <form class="form form--centered" action="" method="post">
        @csrf

        <div class="input">
            <label class="input__label" for="name">{{ __('inputs.NameLabel') }}</label>
            <input class="input__field" type="text" name="name" id="name" placeholder="{{ __('inputs.NameLabel') }}" required>
        </div>
        <div class="input">
            <label class="input__label" for="email">{{ __('inputs.EmailLabel') }}</label>
            <input class="input__field" type="email" name="email" id="email" placeholder="{{ __('inputs.EmailPlaceholder') }}" required>
        </div>
        <div class="input">
            <label class="input__label" for="subject">{{ __('inputs.ContactSubjectLabel') }}</label>
            <input class="input__field" type="text" name="subject" id="subject" placeholder="{{ __('inputs.ContactSubjectPlaceholder') }}" required>
        </div>
        <div class="input">
            <label class="input__label" for="content">{{ __('inputs.ContactMessageLabel') }}</label>
            <textarea class="input__field input__field--area" name="content" id="content" placeholder="{{ __('inputs.ContactMessagePlaceholder') }}" required></textarea>
        </div>
        
        <button class="button" type="submit">{{ __('inputs.ContactSubmitButton') }}</button>
    </form>
@endsection
