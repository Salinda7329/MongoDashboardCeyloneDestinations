<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Notifications\CustomVerifyEmail;
use Illuminate\Auth\Notifications\VerifyEmail;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        VerifyEmail::toMailUsing(function ($notifiable, $verificationUrl) {
            return (new CustomVerifyEmail)->toMail($notifiable);
        });
    }
}
