<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\AdminController;
use App\Http\Controllers\Backend\CompanyController;
use App\Http\Controllers\Backend\BlogCategoryController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\ReviewController;
use App\Http\Controllers\StateRouteController;
use App\Http\Controllers\CityRouteController;
use App\Http\Controllers\ChecklistCategoryController;
use App\Http\Controllers\ChecklistItemController;
use App\Http\Controllers\TopMoverController;
use App\Http\Controllers\BottomMoverController;
use App\Http\Controllers\BestMovingPageController;
use App\Http\Controllers\Backend\QuoteController;
use App\Http\Controllers\Backend\ContactMoverLeadController;

Route::prefix('admin')->group(function(){
    Route::get('/login', [AdminController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login']);
    Route::middleware('admin')->group(function(){
        Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        // Dependent dropdown APIs
        Route::get('/api/states/{state}/cities', [CompanyController::class,'citiesByState'])->name('admin.api.state.cities');
        Route::get('/api/cities/suggest', [CityRouteController::class,'citiesSuggest'])->name('admin.api.cities.suggest');

        Route::resource('companies', CompanyController::class)->names('admin.companies');
        Route::resource('blog-categories', BlogCategoryController::class)->names('admin.blog-categories');
        Route::resource('blogs', BlogController::class)->names('admin.blogs');
        Route::resource('reviews', ReviewController::class)->names('admin.reviews');

        // New modules
        Route::resource('state-routes', StateRouteController::class)->names('admin.state-routes');
        Route::resource('city-routes', CityRouteController::class)->names('admin.city-routes');
        Route::resource('checklist-categories', ChecklistCategoryController::class)->names('admin.checklist-categories');
        Route::resource('checklist-items', ChecklistItemController::class)->names('admin.checklist-items');
        Route::resource('top-movers', TopMoverController::class)->names('admin.top-movers');
        Route::resource('bottom-movers', BottomMoverController::class)->names('admin.bottom-movers');
        Route::resource('best-moving-pages', BestMovingPageController::class)->names('admin.best-moving-pages');
        Route::get('/quotes', [QuoteController::class, 'index'])->name('admin.quotes.index');
        Route::get('/contact-leads', [ContactMoverLeadController::class, 'index'])->name('admin.contact-leads.index');
    });
});


Route::view('test', 'dashboards.layouts.app');
