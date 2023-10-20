<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Setting;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Cache;
class SettingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton('settings', Setting::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot()
{
    // dd(app()->runningInConsole() && count(Schema::getColumnListing('settings')));
    if (!app()->runningInConsole() && count(Schema::getColumnListing('settings'))) {

        $settings = Cache::rememberForever('settings', function () {
            return Setting::all();

        });

        foreach ($settings as $setting) {
            Config::set('settings.'.$setting->key, $setting->value);
            // dd($setting->value) ;
        }

    }
}
}
