<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File; 

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot() {
        if (!File::exists(storage_path('framework/sessions'))) {
            File::makeDirectory(storage_path('framework/sessions'), 0755, true);
        }
    }
}
