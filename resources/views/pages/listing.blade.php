@extends('layouts.master')
@section('title', 'Company Listings | MoveEase')
@section('content')
    <div class="container py-5">
        <h2 class="mb-4 text-center">All Moving Companies</h2>
        <form class="row mb-4 justify-content-center">
            <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Search by company name, city, or zip...">
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary w-100" type="submit">Search</button>
            </div>
        </form>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">FastMove Inc.</h5>
                        <p class="card-text">Nationwide moving services. 4.8 ★</p>
                        <a href="/companies/1" class="btn btn-outline-primary btn-sm">View Profile</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">SafeHands Movers</h5>
                        <p class="card-text">Trusted by thousands. 4.7 ★</p>
                        <a href="/companies/2" class="btn btn-outline-primary btn-sm">View Profile</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Express Relocation</h5>
                        <p class="card-text">Quick and professional. 4.9 ★</p>
                        <a href="/companies/3" class="btn btn-outline-primary btn-sm">View Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
