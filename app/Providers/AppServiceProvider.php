<?php

namespace App\Providers;

use App\Models\Notifikasi;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;

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
    public function boot(): void
    {
        // View::composer('components.layout.header', function ($view) {
        //     $notifikasi = Notifikasi::with('roleRequest')->get();
        //     $view->with('list_notifikasi', $notifikasi);
        // });
        Paginator::useBootstrap();
    }
    
}
