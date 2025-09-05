@extends('layouts.master')
@section('title', ($state->name ?? 'State') . ' Cities & City Routes | MoveEase')
@section('canonical_url', request()->url())

@push('styles')
    <style>
        .routes-hero {
            background: linear-gradient(135deg, var(--accent-color), #6c5ce7);
            color: #fff;
            padding: 60px 0;
        }

        .form-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .06);
            padding: 18px;
        }

        .list-tile {
            display: block;
            background: #fff;
            border: 1px solid #eee;
            border-radius: 10px;
            padding: 14px 16px;
            color: #333;
            text-decoration: none;
            transition: all .2s;
        }

        .list-tile:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, .06);
        }

        .section-title {
            font-weight: 700;
        }
    </style>
@endpush

@section('content')
    <section class="routes-hero">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-6">
                    <h1>{{ $state->name }} Cities & Routes</h1>
                    <p class="lead mb-4">Pick a city to see movers and popular routes within {{ $state->name }}.</p>
                </div>
                <div class="col-lg-6">
                    <div class="form-card">
                        <form method="GET" action="{{ route('front.get.quote') }}">
                            <div class="row g-2">
                                <div class="col-md-4">
                                    <label class="form-label text-muted">Moving From*</label>
                                    <input type="text" id="rc_zip_from" name="zip_from" class="form-control zipfrom"
                                        placeholder="ZIP or City" required autocomplete="off">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label text-muted">Moving To*</label>
                                    <input type="text" id="rc_zip_to" name="zip_to" class="form-control zipto "
                                        placeholder="ZIP or City" required autocomplete="off">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label text-muted">Moving Date</label>
                                    <input type="text" id="rc_move_date" name="move_date" class="form-control movedate"
                                        placeholder="YYYY-MM-DD">
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100"><i class="fas fa-calculator me-2"></i>Get
                                        Quote</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        @if (config('services.google.maps_key'))
            <script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps_key') }}&libraries=places">
            </script>
        @endif
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script>
            (function() {
                function attachAutocomplete(inputId) {
                    const input = document.getElementById(inputId);
                    if (!input || !window.google) return;
                    const options = {
                        componentRestrictions: {
                            country: 'us'
                        },
                        fields: ['address_components', 'formatted_address'],
                        types: ['(regions)']
                    };
                    const ac = new google.maps.places.Autocomplete(input, options);
                    ac.addListener('place_changed', function() {
                        const place = ac.getPlace();
                        const postal = (place.address_components || []).find(c => c.types.includes('postal_code'));
                        const city = (place.address_components || []).find(c => c.types.includes('locality'));
                        const state = (place.address_components || []).find(c => c.types.includes(
                            'administrative_area_level_1'));
                        const full = place.formatted_address || [postal?.long_name, city?.long_name, state
                            ?.short_name, 'USA'
                        ].filter(Boolean).join(', ');
                        if (postal) {
                            input.dataset.postal = postal.long_name;
                            input.value = postal.long_name;
                            input.classList.remove('is-invalid');
                            input.title = full;
                        }
                    });
                }
                attachAutocomplete('rc_zip_from');
                attachAutocomplete('rc_zip_to');
                if (window.flatpickr) {
                    flatpickr('#rc_move_date', {
                        dateFormat: 'Y-m-d',
                        allowInput: true
                    });
                }
            })();
        </script>
    @endpush

    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-7">
                    <h2 class="section-title mb-3">Popular City-to-City Routes in {{ $state->name }}</h2>
                    <div class="row g-3">
                        @forelse($popularCityRoutes as $r)
                            @php
                                $stateSlug = Str::slug($state->name);
                                $fromSlug = Str::slug($r->fromCity->name ?? '');
                                $toSlug = Str::slug($r->toCity->name ?? '');
                            @endphp
                            <div class="col-12">
                                <a class="list-tile"
                                    href="{{ route('front.routes.city.slug', [$stateSlug, $fromSlug, $toSlug]) }}">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <strong>{{ $r->fromCity->name ?? '' }}</strong> to
                                            <strong>{{ $r->toCity->name ?? '' }}</strong>
                                            <div class="text-muted small">~ {{ $r->miles ?? '—' }} miles</div>
                                        </div>
                                        <div class="text-end">
                                            <span class="badge bg-success">From
                                                {{ $r->min_cost ? '$' . number_format($r->min_cost) : '—' }}</span>
                                            <span class="badge bg-warning text-dark">Up to
                                                {{ $r->max_cost ? '$' . number_format($r->max_cost) : '—' }}</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="alert alert-light mb-0">No routes found.</div>
                            </div>
                        @endforelse
                    </div>
                </div>
                <div class="col-lg-5">
                    <h2 class="section-title mb-3">Cities in {{ $state->name }}</h2>
                    <div class="row g-2">
                        @foreach ($cities as $c)
                            <div class="col-6">
                                <a class="list-tile"
                                    href="{{ route('front.city.movers', [Str::slug($state->name), Str::slug($c->name)]) }}">
                                    {{ $c->name }}
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-3">
                        {{ $cities->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
