<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\State;
use App\Models\Country;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::latest()->paginate(15);
        return view('dashboards.admin.companies.index', compact('companies'));
    }

    public function create()
    {
        $states = State::orderBy('name')->get();
        $countries = Country::orderBy('name')->get();
        return view('dashboards.admin.companies.create', compact('states','countries'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:50',
            'website' => 'nullable|url',
            'address_line1' => 'nullable|string|max:255',
            'address_line2' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:120',
            'state_id' => 'nullable|exists:states,id',
            'country_id' => 'nullable|exists:countries,id',
            'zip' => 'nullable|string|max:20',
            'description' => 'nullable|string',
            'status' => 'required|in:active,pending,suspended',
            'logo' => 'nullable|image',
            'dot_number' => 'nullable|string|max:50',
            'mc_number' => 'nullable|string|max:50',
            'license_number' => 'nullable|string|max:50',
            'service_type' => 'required|in:local,long_distance',
            'is_active' => 'boolean',
        ]);
        $data['slug'] = Str::slug($data['name']).'-'.Str::random(5);
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('companies','public');
        }
        Company::create($data);
        return redirect()->route('admin.companies.index')->with('success','Company created');
    }

    public function edit(Company $company)
    {
        $states = State::orderBy('name')->get();
        $countries = Country::orderBy('name')->get();
        return view('dashboards.admin.companies.edit', compact('company','states','countries'));
    }

    public function update(Request $request, Company $company)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:50',
            'website' => 'nullable|url',
            'address_line1' => 'nullable|string|max:255',
            'address_line2' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:120',
            'state_id' => 'nullable|exists:states,id',
            'country_id' => 'nullable|exists:countries,id',
            'zip' => 'nullable|string|max:20',
            'description' => 'nullable|string',
            'status' => 'required|in:active,pending,suspended',
            'logo' => 'nullable|image',
            'dot_number' => 'nullable|string|max:50',
            'mc_number' => 'nullable|string|max:50',
            'license_number' => 'nullable|string|max:50',
            'service_type' => 'required|in:local,long_distance',
            'is_active' => 'boolean',
        ]);
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('companies','public');
        }
        $company->update($data);
        return redirect()->route('admin.companies.index')->with('success','Company updated');
    }

    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('admin.companies.index')->with('success','Company deleted');
    }

    public function citiesByState(State $state)
    {
        $cities = City::where('state_id',$state->id)->orderBy('name')->get(['id','name']);
        return response()->json($cities);
    }
}
