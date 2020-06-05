@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table tablestriped">
                    <thead><tr>
                        <th>ID</th>
                        <th>{{ __('dashboard.Title') }}</th>
                        <th>{{ __('dashboard.Intro') }}</th>
                        <th>
                            <a href="{{ route('dashboard.articles.create') }}" class="button button--light">{{ __('dashboard.CreateArticleButton') }}</a>
                        </th>
                    </tr></thead>
                    <tbody>
                        @foreach ($articles as $article)
                            <tr>
                                <td>{{ $article->id }}</td>
                                <td>{{ $article->title }}</td>
                                <td>{{ Str::limit($article->intro, 50) }}</td>
                                <td>
                                    <div class="dashboardPage__buttonContainer">
                                        <a href="{{ route('dashboard.articles.edit', $article->id) }}" class="button button--round fas fa-pen"></a>
                                        <form class="dashboardPage__deleteContainer" action="{{ route('dashboard.articles.delete', $article->id) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$article->id}}">
                                            <button class="button button--round button--dark fas fa-trash"></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection