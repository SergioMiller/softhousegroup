<?php
declare(strict_types=1);

namespace App\Providers;

use App\Interfaces\LoggerInterface;
use App\Services\Log\LoggerFactory;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(LoggerInterface::class, LoggerFactory::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}
