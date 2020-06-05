@extends('layouts.app')

@section('content')
<div class="articleDetail">
    <h1 class="pageTitle">{{ $article->title }}</h1>

    <img class="articleDetail__image" src="{{ asset('storage/uploads/' . $article->image) }}" alt="">

    <blockquote style="font-style: italic;">
        {{ $article->intro }}
    </blockquote>

    {!! $article->content !!}
</div>
@endsection