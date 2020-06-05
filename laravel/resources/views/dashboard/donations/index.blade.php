@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <table class="table tablestriped">
                    <thead><tr>
                        <th>ID</th>
                        <th>{{ __('dashboard.Email') }}</th>
                        <th>{{ __('dashboard.Name') }}</th>
                        <th>{{ __('dashboard.Donation') }}</th>
                        <th>{{ __('dashboard.Message') }}</th>
                        <th>{{ __('dashboard.Show') }}</th>
                        <th></th>
                    </tr></thead>
                    <tbody>
                        @foreach ($donations as $donation)
                            <tr>
                                <td>{{ $donation->id }}</td>
                                <td>{{ $donation->email }}</td>
                                <td>{{ $donation->name }}</td>
                                <td>{{ $donation->currency . ' ' .strval(number_format($donation->amount, 2, '.', '')) }}</td>
                                <td>{{ Str::limit($donation->message, 50) }}</td>
                                <td>{{ $donation->show }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection