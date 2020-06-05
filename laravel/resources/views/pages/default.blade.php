@extends('layouts.app')

@section('content')
    <div class="defaultPage">
        <h1 class="pageTitle">{{ Lang::has('pages.' . $page->title, App::getLocale()) ? __('pages.' . $page->title) : $page->title }}</h1>

        <blockquote style="font-style: italic;">
            {{ $page->intro }}
        </blockquote>

        {!! $page->content !!}
    </div>
@endsection
