<?php

namespace App\Providers;

use App\Services\APageLinkValidator\APageLinkValidator;
use App\Services\APageLinkValidator\BaseAPageLinkValidator;
use App\Services\LinkGenerator\BaseLinkGenerator;
use App\Services\LinkGenerator\LinkGenerator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(LinkGenerator::class, BaseLinkGenerator::class);
        $this->app->bind(APageLinkValidator::class, BaseAPageLinkValidator::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
