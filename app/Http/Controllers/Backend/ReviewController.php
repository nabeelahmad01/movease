<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Company;
use App\Models\State;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::latest()->with('company')->paginate(20);
        return view('dashboards.admin.reviews.index', compact('reviews'));
    }

    public function create()
    {
        $companies = Company::orderBy('name')->get();
        $states = State::orderBy('name')->get();
        return view('dashboards.admin.reviews.create', compact('companies','states'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'company_id' => 'required|exists:companies,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
            'move_size' => 'nullable|string',
            'move_date' => 'nullable|date',
            'pickup_state_id' => 'nullable|exists:states,id',
            'pickup_city' => 'nullable|string|max:120',
            'delivery_state_id' => 'nullable|exists:states,id',
            'delivery_city' => 'nullable|string|max:120',
            'image1' => 'nullable|image',
            'image2' => 'nullable|image',
            'image3' => 'nullable|image',
        ]);
        foreach(['image1','image2','image3'] as $img){
            if ($request->hasFile($img)) {
                $data[$img] = $request->file($img)->store('reviews','public');
            }
        }
        Review::create($data);
        return redirect()->route('admin.reviews.index')->with('success','Review created');
    }

    public function edit(Review $review)
    {
        $companies = Company::orderBy('name')->get();
        $states = State::orderBy('name')->get();
        return view('dashboards.admin.reviews.edit', compact('review','companies','states'));
    }

    public function update(Request $request, Review $review)
    {
        $data = $request->validate([
            'company_id' => 'required|exists:companies,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
            'move_size' => 'nullable|string',
            'move_date' => 'nullable|date',
            'pickup_state_id' => 'nullable|exists:states,id',
            'pickup_city' => 'nullable|string|max:120',
            'delivery_state_id' => 'nullable|exists:states,id',
            'delivery_city' => 'nullable|string|max:120',
            'image1' => 'nullable|image',
            'image2' => 'nullable|image',
            'image3' => 'nullable|image',
        ]);
        foreach(['image1','image2','image3'] as $img){
            if ($request->hasFile($img)) {
                $data[$img] = $request->file($img)->store('reviews','public');
            }
        }
        $review->update($data);
        return redirect()->route('admin.reviews.index')->with('success','Review updated');
    }

    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('admin.reviews.index')->with('success','Review deleted');
    }
}
