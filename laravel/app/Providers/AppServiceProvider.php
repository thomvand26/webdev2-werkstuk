<?php

namespace App\Providers;

use App\ApiKey;
use App\Page;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $pages = Page::all();
        view()->share('pages', $pages);

        // Get MailChimp API Keys
        $MAILCHIMP_APIKEY = ApiKey::where('key', 'MAILCHIMP_APIKEY')->first();
        $MAILCHIMP_LIST_ID = ApiKey::where('key', 'MAILCHIMP_LIST_ID')->first();
        
        // Put the keys in the config
        config(['newsletter.apiKey' => $MAILCHIMP_APIKEY->value]);
        config(['newsletter.lists.subscribers.id' => $MAILCHIMP_LIST_ID->value]);
    }
}
