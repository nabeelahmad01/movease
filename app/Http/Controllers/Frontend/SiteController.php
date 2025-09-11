<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Review;
use App\Models\StateRoute;
use App\Models\CityRoute;
use App\Models\TopMover;
use App\Models\BottomMover;
use App\Models\BestMovingPage;
use App\Models\State;
use App\Models\City;
use App\Models\ChecklistCategory;
use App\Models\ChecklistItem;
use App\Models\Country;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home()
    {
        // Get dynamic data from admin dashboard
        $reviews = Review::with('company')
            ->latest()
            ->take(6)
            ->get();

        $featuredCompanies = Company::where('is_active', true)
            ->with(['reviews', 'state'])
            ->withAvg('reviews', 'rating')
            ->withCount('reviews')
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        $topMovers = TopMover::where('page', 'home')
            ->with('company')
            ->orderBy('id')
            ->take(6)
            ->get();

        $bottomMovers = BottomMover::where('page', 'home')
            ->with('company')
            ->orderBy('id')
            ->take(6)
            ->get();

        $blogs = \App\Models\Blog::with(['category', 'user'])
            ->latest()
            ->take(3)
            ->get();

        return view('pages.home', compact('reviews', 'featuredCompanies', 'topMovers', 'bottomMovers', 'blogs'));
    }

    public function movers(Request $request)
    {
        $q = trim((string)$request->get('q')) ?: null;

        $companies = Company::where('is_active', true)
            ->with(['state'])
            ->withAvg('reviews', 'rating')
            ->withCount('reviews')
            ->when($q, function ($query) use ($q) {
                $query->where(function ($qq) use ($q) {
                    $qq->where('name', 'LIKE', "%$q%")
                        ->orWhere('city', 'LIKE', "%$q%")
                        ->orWhereHas('state', function ($s) use ($q) {
                            $s->where('name', 'LIKE', "%$q%")
                              ->orWhere('code', 'LIKE', "%$q%");
                        });
                });
            })
            ->orderBy('name')
            ->paginate(12)
            ->appends($request->query());

        $topMovers = TopMover::where('page', 'movers')
            ->with('company')
            ->orderBy('id')
            ->get();

        return view('pages.movers', compact('companies', 'topMovers', 'q'));
    }

    public function listings()
    {
        $companies = Company::where('is_active', true)->with('state')->paginate(12);
        return view('pages.listing', compact('companies'));
    }

    public function blog()
    {
        $blogs = \App\Models\Blog::with(['category', 'user'])
            ->latest()
            ->paginate(9);

        $categories = \App\Models\BlogCategory::orderBy('name')
            ->get();

        $recentBlogs = \App\Models\Blog::latest()
            ->take(5)
            ->get();

        return view('pages.blog', compact('blogs', 'categories', 'recentBlogs'));
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function getQuote()
    {
        return view('pages.get_quote');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function reviewCreate()
    {
        $companies = Company::where('is_active', true)
            ->with(['reviews', 'state'])
            ->paginate(12);
        return view('pages.review_create', compact('companies'));
    }

    public function addListing()
    {
        $companies = Company::where('is_active', true)
            ->with('state')
            ->latest()
            ->paginate(12);
        $states = State::orderBy('name')->get();
        $countries = Country::orderBy('name')->get();
        return view('pages.add_listing', compact('companies', 'states', 'countries'));
    }

    // public function services()
    // {
    //     $topMovers = TopMover::where('page', 'services')
    //                         ->with('company')
    //                         ->orderBy('id')
    //                         ->take(6)
    //                         ->get();

    //     $bottomMovers = BottomMover::where('page', 'services')
    //                               ->with('company')
    //                               ->orderBy('id')
    //                               ->take(6)
    //                               ->get();

    //     return view('pages.services', compact('topMovers', 'bottomMovers'));
    // }

    // Routes index and overviews
    public function routesIndex()
    {
        // Show only states that have at least one route defined (originating state)
        $states = State::whereIn('id', function ($q) {
            $q->select('from_state_id')
                ->from('state_routes')
                ->whereNotNull('from_state_id');
        })
            ->orderBy('name')
            ->get();
        return view('pages.routes_index', compact('states'));
    }

    public function routesState($state)
    {
        $stateName = str_replace('-', ' ', ucwords($state));
        $stateModel = State::where('name', 'LIKE', "%$stateName%")
            ->orWhere('code', strtoupper($state))
            ->firstOrFail();

        $routes = StateRoute::with(['fromState', 'toState'])
            ->where('from_state_id', $stateModel->id)
            ->orderBy('miles')
            ->take(100)
            ->get();

        $cities = City::where('state_id', $stateModel->id)
            ->orderBy('name')
            ->take(200)
            ->get();

        return view('pages.routes_state', [
            'state' => $stateModel,
            'routes' => $routes,
            'cities' => $cities,
        ]);
    }

    public function routesCityIndex($state)
    {
        $stateName = str_replace('-', ' ', ucwords($state));
        $stateModel = State::where('name', 'LIKE', "%$stateName%")
            ->orWhere('code', strtoupper($state))
            ->firstOrFail();

        $cities = City::where('state_id', $stateModel->id)
            ->orderBy('name')
            ->paginate(24);

        // sample popular city routes originating in this state
        $popularCityRoutes = CityRoute::with(['fromCity.state', 'toCity.state'])
            ->whereHas('fromCity', function ($q) use ($stateModel) {
                $q->where('state_id', $stateModel->id);
            })
            ->take(50)
            ->get();

        return view('pages.routes_city', [
            'state' => $stateModel,
            'cities' => $cities,
            'popularCityRoutes' => $popularCityRoutes,
        ]);
    }

    public function stateRouteBySlugs($from, $to)
    {
        $fromName = str_replace('-', ' ', ucwords($from));
        $toName = str_replace('-', ' ', ucwords($to));

        $fromState = State::where('name', 'LIKE', "%$fromName%")
            ->orWhere('code', strtoupper($from))
            ->firstOrFail();
        $toState = State::where('name', 'LIKE', "%$toName%")
            ->orWhere('code', strtoupper($to))
            ->firstOrFail();

        $route = StateRoute::with(['fromState', 'toState'])
            ->where('from_state_id', $fromState->id)
            ->where('to_state_id', $toState->id)
            ->firstOrFail();

        return view('pages.state_route', compact('route'));
    }

    public function cityRouteBySlugs($state, $fromCity, $toCity)
    {
        $stateName = str_replace('-', ' ', ucwords($state));
        $fromName = str_replace('-', ' ', ucwords($fromCity));
        $toName = str_replace('-', ' ', ucwords($toCity));

        $stateModel = State::where('name', 'LIKE', "%$stateName%")
            ->orWhere('code', strtoupper($state))
            ->firstOrFail();

        $from = City::where('name', 'LIKE', "%$fromName%")
            ->where('state_id', $stateModel->id)
            ->firstOrFail();
        $to = City::where('name', 'LIKE', "%$toName%")
            ->where('state_id', $stateModel->id)
            ->firstOrFail();

        $route = CityRoute::with(['fromCity.state', 'toCity.state'])
            ->where('from_city_id', $from->id)
            ->where('to_city_id', $to->id)
            ->firstOrFail();

        return view('pages.city_route', compact('route'));
    }

    public function stateMovers($state)
    {
        // Convert slug to state name
        $stateName = str_replace('-', ' ', ucwords($state));

        // Find state by name or slug
        $stateModel = State::where('name', 'LIKE', "%$stateName%")
            ->orWhere('code', strtoupper($state))
            ->first();

        if (!$stateModel) {
            abort(404);
        }

        $stateName = $stateModel->name;

        // Get companies in this state
        $companies = Company::where('state_id', $stateModel->id)
            ->where('is_active', true)
            ->withCount('reviews')
            ->paginate(12);

        // Get top movers for this state
        $topMovers = TopMover::where('page', 'LIKE', "%$stateName%")
            ->with('company')
            ->take(3)
            ->get();

        // Get bottom movers for this state
        $bottomMovers = BottomMover::where('page', 'LIKE', "%$stateName%")
            ->with('company')
            ->take(2)
            ->get();

        return view('pages.state_movers', compact('stateName', 'companies', 'topMovers', 'bottomMovers'));
    }

    public function cityMovers($state, $city)
    {
        // Convert slugs to names
        $stateName = str_replace('-', ' ', ucwords($state));
        $cityName = str_replace('-', ' ', ucwords($city));

        // Find state
        $stateModel = State::where('name', 'LIKE', "%$stateName%")
            ->orWhere('code', strtoupper($state))
            ->first();

        if (!$stateModel) {
            abort(404);
        }

        // Find city
        $cityModel = City::where('name', 'LIKE', "%$cityName%")
            ->where('state_id', $stateModel->id)
            ->first();

        if (!$cityModel) {
            abort(404);
        }

        $stateName = $stateModel->name;
        $cityName = $cityModel->name;
        $cityZip = $cityModel->zip_code;

        // Get companies in this city
        $companies = Company::where('city', 'LIKE', "%$cityName%")
            ->where('state_id', $stateModel->id)
            ->where('is_active', true)
            ->withCount('reviews')
            ->paginate(12);

        return view('pages.city_movers', compact('stateName', 'cityName', 'cityZip', 'companies'));
    }

    public function bestMovingPage($slug)
    {
        $page = BestMovingPage::where('slug', $slug)->first();
        if (!$page) {
            abort(404);
        }

        $topMovers = TopMover::where('page', $page->slug)
            ->with('company')
            ->orderBy('id')
            ->get();

        $bottomMovers = BottomMover::where('page', $page->slug)
            ->with('company')
            ->orderBy('position')
            ->get();

        return view('pages.best_moving_page', compact('page', 'topMovers', 'bottomMovers'));
    }

    public function cityRouteShow($id)
    {
        $route = CityRoute::with(['fromCity.state', 'toCity.state'])->findOrFail($id);
        return view('pages.city_route', compact('route'));
    }

    public function stateRouteShow($id)
    {
        $route = StateRoute::with(['fromState', 'toState'])->findOrFail($id);
        return view('pages.state_route', compact('route'));
    }

    public function checklistCategory($slug)
    {
        $category = ChecklistCategory::where('slug', $slug)->first();
        if (!$category) {
            abort(404);
        }

        $items = ChecklistItem::where('checklist_category_id', $category->id)
            ->orderBy('order')
            ->get();

        return view('pages.checklist', compact('category', 'items'));
    }

    public function search(Request $request)
    {
        $query = $request->get('q');
        $companies = Company::where('name', 'LIKE', "%$query%")
            ->orWhere('description', 'LIKE', "%$query%")
            ->where('is_active', true)
            ->paginate(12);

        return view('pages.search_results', compact('companies', 'query'));
    }

    public function companyProfile($slug)
    {
        $company = Company::where('slug', $slug)
            ->where('is_active', true)
            ->with(['reviews' => function ($query) {
                $query->latest();
            }, 'state', 'country'])
            ->firstOrFail();

        return view('pages.company_profile', compact('company'));
    }

    public function reviewForm($slug)
    {
        $company = Company::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        return view('pages.review_form', compact('company'));
    }

    public function reviewStore(Request $request, $slug)
    {
        $company = Company::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'rating' => 'required|integer|min:1|max:5',
            'title' => 'required|string|max:255',
            'review' => 'required|string|min:10',
            'move_date' => 'nullable|date',
            'move_type' => 'nullable|string|in:local,interstate,commercial,specialty',
            'would_recommend' => 'required|boolean'
        ]);

        $validated['company_id'] = $company->id;
        // $validated['status'] = 'pending'; // Reviews need approval (status column doesn't exist)

        Review::create($validated);

        return redirect()->route('front.review.create')
            ->with('success', 'Thank you! Your review has been submitted and is pending approval.');
    }

    public function blogDetail($slug)
    {
        $blog = \App\Models\Blog::with(['category', 'user'])
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedBlogs = \App\Models\Blog::where('id', '!=', $blog->id)
            ->where('category_id', $blog->category_id)
            ->take(3)
            ->get();

        return view('pages.blog_detail', compact('blog', 'relatedBlogs'));
    }

    public function blogCategory($slug)
    {
        $category = \App\Models\BlogCategory::where('slug', $slug)->firstOrFail();

        $blogs = \App\Models\Blog::with(['category', 'user'])
            ->where('category_id', $category->id)
            ->latest()
            ->paginate(9);

        $categories = \App\Models\BlogCategory::orderBy('name')->get();
        $recentBlogs = \App\Models\Blog::latest()->take(5)->get();

        return view('pages.blog', compact('blogs', 'category', 'categories', 'recentBlogs'));
    }

    public function addBusiness()
    {
        $companies = Company::where('is_active', true)
            ->with('state')
            ->latest()
            ->paginate(12);
        $states = State::orderBy('name')->get();
        $countries = Country::orderBy('name')->get();
        return view('pages.add_listing', compact('companies', 'states', 'countries'));
    }

    public function addListingStore(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'website' => 'nullable|url|max:255',
            'address_line1' => 'nullable|string|max:255',
            'address_line2' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:120',
            'state_id' => 'nullable|exists:states,id',
            'country_id' => 'nullable|exists:countries,id',
            'zip' => 'nullable|string|max:20',
            'service_type' => 'nullable|string|max:120',
            'dot_number' => 'nullable|string|max:120',
            'mc_number' => 'nullable|string|max:120',
            'license_number' => 'nullable|string|max:120',
            'description' => 'nullable|string',
        ]);

        // Default moderation flags
        $data['is_active'] = false;
        $data['status'] = $data['status'] ?? 'pending';

        Company::create($data);

        return redirect()->route('front.add.listing')
            ->with('success', 'Thank you! Your company has been submitted and is pending review.');
    }
    public function checklist()
    {
        $categories = ChecklistCategory::orderBy('name')->get();
        $items = ChecklistItem::all();
        return view('pages.checklist', compact('categories', 'items'));
    }
}
