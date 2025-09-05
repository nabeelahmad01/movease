<?php

namespace App\Http\Controllers;

use App\Models\CityRoute;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CityRouteController extends Controller
{
    public function index()
    {
        $routes = CityRoute::with(['fromCity','toCity'])->latest()->paginate(20);
        return view('dashboards.admin.city_routes.index', compact('routes'));
    }

    public function create()
    {
        return view('dashboards.admin.city_routes.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'from_city_id' => 'required|exists:cities,id',
            'to_city_id' => 'required|exists:cities,id',
            'title' => 'nullable|string|max:255',
            'slug' => 'nullable|string|max:255|unique:city_routes,slug',
            'min_cost' => 'nullable|numeric',
            'max_cost' => 'nullable|numeric',
            'miles' => 'nullable|integer',
        ]);
        if (empty($data['slug'])) { $data['slug'] = Str::slug(($data['title'] ?? 'route').'-'.Str::random(5)); }
        CityRoute::create($data);
        return redirect()->route('admin.city-routes.index')->with('success','City route created');
    }

    public function edit(CityRoute $city_route)
    {
        return view('dashboards.admin.city_routes.edit', ['route'=>$city_route]);
    }

    public function update(Request $request, CityRoute $city_route)
    {
        $data = $request->validate([
            'from_city_id' => 'required|exists:cities,id',
            'to_city_id' => 'required|exists:cities,id',
            'title' => 'nullable|string|max:255',
            'slug' => 'nullable|string|max:255|unique:city_routes,slug,'.$city_route->id,
            'min_cost' => 'nullable|numeric',
            'max_cost' => 'nullable|numeric',
            'miles' => 'nullable|integer',
        ]);
        $city_route->update($data);
        return redirect()->route('admin.city-routes.index')->with('success','City route updated');
    }

    public function destroy(CityRoute $city_route)
    {
        $city_route->delete();
        return redirect()->route('admin.city-routes.index')->with('success','City route deleted');
    }

    public function citiesSuggest(Request $request)
    {
        $q = (string)$request->query('q','');
        $results = City::query()
            ->when($q, fn($qr)=>$qr->where('name','like',"%{$q}%"))
            ->orderBy('name')
            ->limit(20)
            ->get(['id','name']);
        return response()->json($results);
    }
}
