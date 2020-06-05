@section('footer')
    <div class="footer">
        <div class="footer__left">
            <div class="social footer__social">
                <div class="social__link icon fab fa-facebook-f"></div>
                <div class="social__link icon fab fa-twitter"></div>
                <div class="social__link icon fab fa-instagram"></div>
            </div>
        </div>
        <div class="footer__right">
            <div class="footer__subscribe">{{ __('footer.SubscribeHeader') }}</div>
            <form class="form" action="{{ route('mail.subscribe') }}" method="post">
                @csrf
                    
                <div class="input">
                    <label class="input__label" for="email">{{ __('inputs.EmailLabel') }}</label>
                    <input class="input__field" type="email" name="email" id="email" placeholder="{{ __('inputs.EmailPlaceholder') }}" required>
                </div>

                <button type="submit" class="button">{{ __('footer.SubscribeButton') }}</button>
            </form>
        </div>
    </div>
@endsection
