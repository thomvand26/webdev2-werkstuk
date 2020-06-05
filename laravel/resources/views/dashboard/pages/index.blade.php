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
                        <th>{{ __('dashboard.Template') }}</th>
                        <th>{{ __('dashboard.Active') }}</th>
                        <th>
                            <a href="{{ route('dashboard.pages.create') }}" class="button button--light">{{ __('dashboard.CreatePageTitle') }}</a>
                        </th>
                    </tr></thead>
                    <tbody>
                        @foreach ($pages as $page)
                            <tr>
                                <td>{{ $page->id }}</td>
                                <td>{{ $page->title }}</td>
                                <td>{{ Str::limit($page->intro, 50) }}</td>
                                <td>{{ $page->template }}</td>
                                <td>{{ $page->active }}</td>
                                <td>
                                    <div class="dashboardPage__buttonContainer">
                                        <a href="{{ route('dashboard.pages.edit', $page->id) }}" class="button button--round fas fa-pen"></a>
                                        <form class="dashboardPage__deleteContainer" action="{{ route('dashboard.pages.delete', $page->id) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$page->id}}">
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