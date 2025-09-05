<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\QuoteRequest;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function index()
    {
        $quotes = QuoteRequest::latest()->paginate(20);
        return view('dashboards.admin.quotes', compact('quotes'));
    }
}
