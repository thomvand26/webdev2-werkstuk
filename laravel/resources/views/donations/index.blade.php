@extends('layouts.app')

@section('content')
    <h1 class="pageTitle">{{ __('pages.Donate') }}</h1>
    <div class="donation__page">
        <div class="donation__list">
            @foreach ($donations as $donation)
                <div class="donation__container">
                    <div class="donation__info">
                        <div class="donation__name">{{ $donation->name }}</div>
                        <div class="donation__amount">{{ $donation->currency . ' ' .strval(number_format($donation->amount, 2, '.', '')) }}</div>
                    </div>
                    <div class="donation__message">{{ $donation->message }}</div>
                </div>
            @endforeach
        </div>
        <form class="form" class="donation__form" action="{{ route('donations.create') }}" method="post">
            @csrf

            <div class="input">
                <label class="input__label" for="name">{{ __('inputs.NameLabel') }}</label>
                <input class="input__field" type="text" name="name" id="name" placeholder="{{ __('inputs.NameLabel') }}" required>
            </div>
            <div class="input">
                <label class="input__label" for="email">{{ __('inputs.EmailLabel') }}</label>
                <input class="input__field" type="email" name="email" id="email" placeholder="{{ __('inputs.EmailPlaceholder') }}" required>
            </div>
            <div class="input input--limit">
                <label class="input__label" for="amount">{{ __('inputs.DonationAmountLabel') }}</label>
                <div class="input__moneyContainer">
                    <select class="input__select input__select--currency" name="currency" id="currency" required>
                        @foreach ($currencies as $curr)
                            <option class="input__option" @if($curr == 'EUR') selected @endif value="{{ $curr }}">{{ $curr }}</option>
                        @endforeach
                    </select>
                    <input class="input__field input__field--withCurrency" type="number" name="amount" id="amount" placeholder="10.00" min="0.00" step="0.01" required>
                </div>
            </div>
            <div class="input">
                <label class="input__label" for="message">{{ __('inputs.DonationMessageLabel') }}</label>
                <textarea class="input__field input__field--area" name="message" id="message" placeholder="{{ __('inputs.DonationMessagePlaceholder') }}"></textarea>
            </div>
            <div class="input">
                <label class="input__label" for="show">{{ __('inputs.DonationShowLabel') }}</label>
                <input class="input__checkbox" type="checkbox" name="show" id="show" value="1" checked>
            </div>

            <button class="button" type="submit">
                {{ __('inputs.DonationSubmitButton') }}
            </button>
        </form>
    </div>
@endsection