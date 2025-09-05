<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\SiteController;
use App\Http\Controllers\Backend\QuoteController as AdminQuoteController;
use App\Models\QuoteRequest;
use Illuminate\Http\Request;

Route::get('/', [SiteController::class,'home'])->name('front.home');
Route::get('/movers', [SiteController::class,'movers'])->name('front.movers');
Route::get('/listings', [SiteController::class,'listings'])->name('front.listings');
Route::get('/blog', [SiteController::class,'blog'])->name('front.blog');
Route::get('/blog/category/{slug}', [SiteController::class,'blogCategory'])->name('front.blog.category');
Route::get('/blog/{slug}', [SiteController::class,'blogDetail'])->name('front.blog.detail');
Route::get('/contact', [SiteController::class,'contact'])->name('front.contact');
Route::get('/get-quote', [SiteController::class,'getQuote'])->name('front.get.quote');
Route::get('/about', [SiteController::class,'about'])->name('front.about');
Route::get('/review/create', [SiteController::class,'reviewCreate'])->name('front.review.create');
Route::get('/review/{company}/form', [SiteController::class,'reviewForm'])->name('front.review.form');
Route::post('/review/{company}/store', [SiteController::class,'reviewStore'])->name('front.review.store');
Route::get('/add-listing', [SiteController::class,'addListing'])->name('front.add.listing');
Route::get('/services', [SiteController::class,'services'])->name('front.services');

// Company Profile Route
Route::get('/company/{slug}', [SiteController::class,'companyProfile'])->name('front.company.profile');

// State and City Routes
Route::get('/movers/{state}', [SiteController::class,'stateMovers'])->name('front.state.movers');
Route::get('/movers/{state}/{city}', [SiteController::class,'cityMovers'])->name('front.city.movers');

// Dynamic Content Routes
Route::get('/best-moving/{slug}', [SiteController::class,'bestMovingPage'])->name('front.best.moving');
Route::get('/routes/city/{id}', [SiteController::class,'cityRouteShow'])
    ->whereNumber('id')
    ->name('front.city.route');
Route::get('/routes/state/{id}', [SiteController::class,'stateRouteShow'])
    ->whereNumber('id')
    ->name('front.state.route');
Route::get('/checklist', [SiteController::class,'checklist'])->name('front.checklist');
Route::get('/checklist/{slug}', [SiteController::class,'checklistCategory'])->name('front.checklist.category');

// Submit Quote Request
Route::post('/get-quote', function (Request $request) {
    $data = $request->validate([
        'zip_from' => 'required|string',
        'zip_to' => 'required|string',
        'move_date' => 'nullable|date',
        'move_size' => 'nullable|string',
        'name' => 'required|string|max:120',
        'email' => 'required|email',
        'phone' => 'required|string|max:50',
    ]);
    QuoteRequest::create($data);
    return redirect()->route('front.thankyou');
})->name('front.quote.submit');

Route::get('/thank-you', fn() => view('pages.thankyou'))->name('front.thankyou');

Route::get('add-business', [SiteController::class, 'addBusiness'])->name('front.add-business');
Route::post('/add-listing', [SiteController::class,'addListingStore'])->name('front.add.listing.store');

// Routes Index + Overviews
Route::get('/routes', [SiteController::class,'routesIndex'])->name('front.routes.index');
Route::get('/routes/state/{state}', [SiteController::class,'routesState'])->name('front.routes.state');
Route::get('/routes/city/{state}', [SiteController::class,'routesCityIndex'])->name('front.routes.city.index');

// Slug-based state-to-state and city-to-city pages
Route::get('/routes/state/{from}/{to}', [SiteController::class,'stateRouteBySlugs'])->name('front.routes.state.slug');
Route::get('/routes/city/{state}/{fromCity}-to-{toCity}', [SiteController::class,'cityRouteBySlugs'])->name('front.routes.city.slug');