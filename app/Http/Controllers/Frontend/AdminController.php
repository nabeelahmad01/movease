<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;
use App\Models\Review;
use App\Models\Blog;
use App\Models\QuoteRequest;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function showLogin() { return view('auth.admin_login'); }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->is_admin) {
                return redirect()->route('admin.dashboard');
            }
        }
        return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }

    public function dashboard()
    {
        $companiesCount = Company::count();
        $reviewsCount   = Review::count();
        $reviewsThisMonth = Review::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->count();
        $blogsCount     = Blog::count();
        $quotesCount    = QuoteRequest::count();
        $pendingQuotesCount = QuoteRequest::where('status', 'pending')->count();
        $recentQuotes   = QuoteRequest::latest()->limit(10)->get();

        return view('dashboards.admin.dashboard', compact(
            'companiesCount','reviewsCount','reviewsThisMonth','blogsCount','quotesCount','pendingQuotesCount','recentQuotes'
        ));
    }
}
