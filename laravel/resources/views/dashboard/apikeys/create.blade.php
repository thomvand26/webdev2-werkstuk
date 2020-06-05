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
        {{ __('dashboard.CreateAPIKeyTitle') }}
    </div>
    <form class="form" action="{{ route('dashboard.apikeys.create.post') }}" method="post">
        @csrf
        
        <div class="input">
            <label class="input__label" for="key">{{ __('inputs.KeyLabel') }}</label>
            <input class="input__field" type="text" name="key" id="key" placeholder="{{ __('inputs.KeyPlaceholder') }}">
        </div>
        <div class="input">
            <label class="input__label" for="value">{{ __('inputs.ValueLabel') }}</label>
            <input class="input__field" type="text" name="value" id="value" placeholder="{{ __('inputs.ValuePlaceholder') }}">
        </div>
    
        <button class="button" type="submit">
            {{ __('dashboard.SaveButton') }}
        </button>
    </form>
</div>
@endsection