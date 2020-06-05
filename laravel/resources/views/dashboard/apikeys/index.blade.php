@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table tablestriped">
                    <thead><tr>
                        <th>ID</th>
                        <th>{{ __('dashboard.Key') }}</th>
                        <th>{{ __('dashboard.Value') }}</th>
                        <th>
                            <a href="{{ route('dashboard.apikeys.create') }}" class="button button--light">{{ __('dashboard.CreateAPIKeyTitle') }}</a>
                        </th>
                    </tr></thead>
                    <tbody>
                        @foreach ($apikeys as $key)
                            <tr>
                                <td>{{ $key->id }}</td>
                                <td>{{ $key->key }}</td>
                                <td>{{ $key->value }}</td>
                                <td>
                                    <div class="dashboardPage__buttonContainer">
                                        <a href="{{ route('dashboard.apikeys.edit', $key->id) }}" class="button button--round fas fa-pen"></a>
                                        <form class="dashboardPage__deleteContainer" action="{{ route('dashboard.apikeys.delete', $key->id) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$key->id}}">
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