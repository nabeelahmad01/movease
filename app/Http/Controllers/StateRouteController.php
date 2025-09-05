<?php

namespace App\Http\Controllers;

use App\Models\StateRoute;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StateRouteController extends Controller
{
    public function index()
    {
        $routes = StateRoute::with(['fromState','toState'])->latest()->paginate(20);
        return view('dashboards.admin.state_routes.index', compact('routes'));
    }

    public function create()
    {
        $states = State::orderBy('name')->get();
        return view('dashboards.admin.state_routes.create', compact('states'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'from_state_id' => 'required|exists:states,id',
            'to_state_id' => 'required|exists:states,id',
            'title' => 'nullable|string|max:255',
            'slug' => 'nullable|string|max:255|unique:state_routes,slug',
            'min_cost' => 'nullable|numeric',
            'max_cost' => 'nullable|numeric',
            'miles' => 'nullable|integer',
        ]);
        if (empty($data['slug'])) { $data['slug'] = Str::slug(($data['title'] ?? 'route').'-'.Str::random(5)); }
        StateRoute::create($data);
        return redirect()->route('admin.state-routes.index')->with('success','State route created');
    }

    public function edit(StateRoute $state_route)
    {
        $states = State::orderBy('name')->get();
        return view('dashboards.admin.state_routes.edit', ['route'=>$state_route,'states'=>$states]);
    }

    public function update(Request $request, StateRoute $state_route)
    {
        $data = $request->validate([
            'from_state_id' => 'required|exists:states,id',
            'to_state_id' => 'required|exists:states,id',
            'title' => 'nullable|string|max:255',
            'slug' => 'nullable|string|max:255|unique:state_routes,slug,'.$state_route->id,
            'min_cost' => 'nullable|numeric',
            'max_cost' => 'nullable|numeric',
            'miles' => 'nullable|integer',
        ]);
        $state_route->update($data);
        return redirect()->route('admin.state-routes.index')->with('success','State route updated');
    }

    public function destroy(StateRoute $state_route)
    {
        $state_route->delete();
        return redirect()->route('admin.state-routes.index')->with('success','State route deleted');
    }
}
