<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use App\Models\BlogCategory;
use App\Models\State;
use App\Models\BestMovingPage;

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
        Route::aliasMiddleware('admin', \App\Http\Middleware\IsAdmin::class);

        View::composer('layouts.header', function ($view) {
            $view->with('headerBlogCategories', BlogCategory::orderBy('name')->get());
            $view->with('headerStates', State::orderBy('name')->get());
            $view->with('headerBestPages', BestMovingPage::orderBy('page_name')->get());
        });
    }
}
