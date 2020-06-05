@extends('layouts.app')

@section('content')
    <h1 class="pageTitle">{{ __('pages.News') }}</h1>
    <div class="articleCard__container">
        @foreach ($articles as $article)
            <div class="articleCard">
                <div class="articleCard__left">
                    <img src="{{ asset('storage/uploads/' . $article->image) }}" alt="" srcset="">
                </div>
                <div class="articleCard__right">
                    <div class="articleCard__top">
                        <div class="articleCard__title">{{ $article->title }}</div>
                        <div class="articleCard__intro">{{ Str::limit($article->intro, 50) }}</div>
                    </div>
                    <div class="articleCard__bottom">
                        <a class="button" href="{{ route('news.detail', $article->id) }}">{{ __('inputs.ArticleReadMoreButton') }}</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="news__pagination">
        {!! $articles->links() !!}
    </div>
@endsection