@extends('layouts.app')

@section('content')
<div class="homePage">
    <h1 class="pageTitle">{{  config('app.name', 'Yousician') }}</h1>
    <p class="homePage__subTitle">Yousician offers thousands of songs, exercises, and teacher-crafted lessons all in one app.</p>
    <div class="homeActionButtons">
        <a class="button homeActionButton homeActionButton--left" href="https://yousician.onelink.me/7MHE?pid=yousician-landing&c=global-footer&af_dp=yousician%3A%2F%2Fhome&af_web_dp=https%3A%2F%2Fplay.google.com%2Fstore%2Fapps%2Fdetails%3Fid%3Dcom.yousician.yousician&af_ad=button_download_from_google_play_position_footer">Dowbload for Android</a>
        <div class="homeActionButtons__seperator">OR</div>
        <a class="button homeActionButton homeActionButton--right" href="https://yousician.onelink.me/7MHE?pid=yousician-landing&c=global-footer&af_dp=yousician%3A%2F%2Fhome&af_web_dp=https%3A%2F%2Fitunes.apple.com%2Fus%2Fapp%2Fyousician%2Fid959883039&af_ad=button_download_from_app_store_position_footer">Dowbload for IOS</a>
    </div>
    {!! $page->content !!}
</div>
@endsection
