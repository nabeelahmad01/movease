@extends('layouts.master')
@section('title', $stateName . ' Movers - Professional Moving Services | MoveEase')
@section('meta_description', 'Find reliable movers in ' . $stateName . '. Get free quotes from top-rated moving
    companies. Professional ' . $stateName . ' moving services with competitive pricing.')
@section('meta_keywords', $stateName . ' movers, moving companies ' . $stateName . ', ' . $stateName . ' moving
    services, interstate movers ' . $stateName)
    <style>
        svg {
            width: 30px !important;
        }
    </style>
@section('content')
    <!-- Hero Section -->
    <section class="hero-section bg-primary text-white py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('front.home') }}" class="text-white">Home</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">{{ $stateName }} Movers</li>
                        </ol>
                    </nav>
                    <h1 class="display-4 fw-bold mb-3">{{ $stateName }} Moving Companies</h1>
                    <p class="lead mb-4">Find reliable and professional moving services in {{ $stateName }}. Get free
                        quotes from top-rated movers and save money on your move.</p>
                    <div class="d-flex gap-3">
                        <a href="#cost-calculator" class="btn btn-warning btn-lg">Calculate Moving Cost</a>
                        <a href="#companies" class="btn btn-outline-light btn-lg">View All Companies</a>
                    </div>
                </div>
                <div class="col-lg-4 text-center">
                    <i class="fas fa-truck fa-6x text-warning"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- Moving Cost Calculator -->
    <section id="cost-calculator" class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="display-5 fw-bold text-primary">Moving Cost Calculator</h2>
                    <p class="lead text-muted">Get an estimate for your {{ $stateName }} move</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow-lg border-0">
                        <div class="card-body p-5">
                            <form id="costCalculator">
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Moving From</label>
                                        <input type="text" class="form-control zipfrom" id="calc_from"
                                            placeholder="Enter zip code">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Moving To</label>
                                        <input type="text" class="form-control zipto" id="calc_to"
                                            placeholder="Enter zip code">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Home Size</label>
                                        <select class="form-select" id="calc_size">
                                            <option value="">Select size</option>
                                            <option value="studio">Studio (1-2 rooms)</option>
                                            <option value="1br">1 Bedroom</option>
                                            <option value="2br">2 Bedroom</option>
                                            <option value="3br">3 Bedroom</option>
                                            <option value="4br">4+ Bedroom</option>
                                            <option value="office">Office/Commercial</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Moving Date</label>
                                        <input type="date" class="form-control movedate" id="calc_date">
                                    </div>
                                    <div class="col-12">
                                        <button type="button" class="btn btn-primary btn-lg w-100"
                                            onclick="calculateCost()">Calculate Cost</button>
                                    </div>
                                </div>
                            </form>
                            <div id="costResult" class="mt-4 d-none">
                                <div class="alert alert-success">
                                    <h5 class="alert-heading">Estimated Moving Cost</h5>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h3 class="text-primary" id="estimatedCost">$0</h3>
                                            <small class="text-muted">Estimated Total</small>
                                        </div>
                                        <div class="col-md-4">
                                            <h5 class="text-warning" id="distance">0 miles</h5>
                                            <small class="text-muted">Distance</small>
                                        </div>
                                        <div class="col-md-4">
                                            <h5 class="text-info" id="duration">0 days</h5>
                                            <small class="text-muted">Estimated Time</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Top Movers Section -->
    @if (isset($topMovers) && count($topMovers) > 0)
        <section class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center mb-5">
                        <h2 class="display-5 fw-bold text-primary">Top {{ $stateName }} Moving Companies</h2>
                        <p class="lead text-muted">Featured movers with excellent ratings and service</p>
                    </div>
                </div>
                <div class="row g-4">
                    @foreach ($topMovers as $mover)
                        <div class="col-lg-4 col-md-6">
                            <div class="card h-100 shadow-sm border-0 hover-lift">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="bg-warning rounded-circle d-flex align-items-center justify-content-center me-3"
                                            style="width: 60px; height: 60px;">
                                            <i class="fas fa-star fa-2x text-white"></i>
                                        </div>
                                        <div>
                                            <h5 class="fw-bold text-primary mb-0">
                                                {{ $mover->company->name ?? 'Moving Company' }}</h5>
                                            <div class="text-warning">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <i class="fas fa-star{{ $i <= 4 ? '' : '-o' }}"></i>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                    <h6 class="fw-bold text-warning">{{ $mover->heading ?? 'Top Rated Mover' }}</h6>
                                    <p class="text-muted small">{{ $mover->point1 ?? 'Professional service' }}</p>
                                    <p class="text-muted small">{{ $mover->point2 ?? 'Competitive pricing' }}</p>
                                    <p class="text-muted small">{{ $mover->point3 ?? 'Full insurance coverage' }}</p>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <span class="badge bg-primary">{{ $mover->phone ?? '(555) 123-4567' }}</span>
                                        <a href="#" class="btn btn-outline-primary btn-sm">Get Quote</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- Companies List -->
    <section id="companies" class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="display-5 fw-bold text-primary">All {{ $stateName }} Moving Companies</h2>
                    <p class="lead text-muted">Browse and compare all registered movers in {{ $stateName }}</p>
                </div>
            </div>
            <div class="row g-4">
                @forelse($companies ?? [] as $company)
                    <div class="col-lg-6 col-md-12">
                        <div class="card h-100 shadow-sm border-0">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-start">
                                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3"
                                        style="width: 60px; height: 60px;">
                                        <i class="fas fa-truck fa-2x text-white"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h5 class="fw-bold text-primary mb-1">{{ $company->name }}</h5>
                                        <p class="text-muted small mb-2">{{ $company->city ?? 'City' }},
                                            {{ $stateName }}</p>
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="text-warning me-2">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    <i
                                                        class="fas fa-star{{ $i <= ($company->rating ?? 4) ? '' : '-o' }}"></i>
                                                @endfor
                                            </div>
                                            <span class="text-muted small">({{ $company->reviews_count ?? 0 }}
                                                reviews)</span>
                                        </div>
                                        <p class="text-muted small mb-3">
                                            {{ Str::limit($company->description ?? 'Professional moving services', 120) }}
                                        </p>
                                        <div class="d-flex gap-2">
                                            <a href="#" class="btn btn-outline-primary btn-sm">View Profile</a>
                                            <a href="#" class="btn btn-warning btn-sm">Get Quote</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <div class="alert alert-info">
                            <i class="fas fa-info-circle fa-2x text-info mb-3"></i>
                            <h5>No companies found in {{ $stateName }}</h5>
                            <p class="mb-0">Check back soon for new moving companies in your area.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            @if (isset($companies) && $companies->hasPages())
                <div class="row mt-5">
                    <div class="col-12">
                        <nav aria-label="Companies pagination">
                            {{ $companies->links() }}
                        </nav>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- Bottom Movers Section -->
    @if (isset($bottomMovers) && count($bottomMovers) > 0)
        <section class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center mb-5">
                        <h2 class="display-5 fw-bold text-primary">Compare Moving Options</h2>
                        <p class="lead text-muted">Detailed comparison of {{ $stateName }} moving services</p>
                    </div>
                </div>
                <div class="row g-4">
                    @foreach ($bottomMovers as $mover)
                        <div class="col-lg-6 col-md-12">
                            <div class="card h-100 shadow-sm border-0">
                                <div class="card-header bg-warning text-dark">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0 fw-bold">{{ $mover->heading ?? 'Moving Service' }}</h5>
                                        <span class="badge bg-primary">{{ $mover->badge_heading ?? 'Featured' }}</span>
                                    </div>
                                </div>
                                <div class="card-body p-4">
                                    <h6 class="fw-bold text-primary mb-3">{{ $mover->company->name ?? 'Moving Company' }}
                                    </h6>
                                    <ul class="list-unstyled mb-3">
                                        <li class="mb-2"><i
                                                class="fas fa-check text-success me-2"></i>{{ $mover->point1 ?? 'Professional service' }}
                                        </li>
                                        <li class="mb-2"><i
                                                class="fas fa-check text-success me-2"></i>{{ $mover->point2 ?? 'Competitive pricing' }}
                                        </li>
                                        <li class="mb-2"><i
                                                class="fas fa-check text-success me-2"></i>{{ $mover->point3 ?? 'Full insurance coverage' }}
                                        </li>
                                        @if ($mover->point4)
                                            <li class="mb-2"><i
                                                    class="fas fa-check text-success me-2"></i>{{ $mover->point4 }}</li>
                                        @endif
                                    </ul>
                                    @if ($mover->content)
                                        <div class="mb-3">
                                            {!! Str::limit($mover->content, 200) !!}
                                        </div>
                                    @endif
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="text-muted small">Deposit:
                                            {{ $mover->deposit_required ? 'Required' : 'Not Required' }}</span>
                                        <a href="#" class="btn btn-warning btn-sm">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- SEO Content Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2 class="fw-bold text-primary mb-4">Moving Services in {{ $stateName }}</h2>
                    <div class="content-section">
                        <p class="lead">Looking for reliable moving companies in {{ $stateName }}? You've come to the
                            right place. Our platform connects you with professional movers who provide exceptional service
                            and competitive pricing.</p>

                        <h3 class="h4 fw-bold text-primary mt-4 mb-3">Why Choose {{ $stateName }} Movers?</h3>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i><strong>Licensed &
                                    Insured:</strong> All our movers are properly licensed and fully insured</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i><strong>Competitive
                                    Pricing:</strong> Get multiple quotes to find the best deal</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i><strong>Professional
                                    Service:</strong> Experienced crews handle your move with care</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i><strong>Full-Service
                                    Options:</strong> From packing to unpacking, we've got you covered</li>
                        </ul>

                        <h3 class="h4 fw-bold text-primary mt-4 mb-3">Types of Moving Services in {{ $stateName }}</h3>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="card border-0 shadow-sm">
                                    <div class="card-body">
                                        <h5 class="fw-bold text-primary"><i class="fas fa-home me-2"></i>Residential Moves
                                        </h5>
                                        <p class="small text-muted">Complete home relocation services including packing,
                                            loading, transportation, and unloading.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card border-0 shadow-sm">
                                    <div class="card-body">
                                        <h5 class="fw-bold text-primary"><i class="fas fa-building me-2"></i>Commercial
                                            Moves</h5>
                                        <p class="small text-muted">Office and business relocation with minimal downtime
                                            and professional handling.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card border-0 shadow-sm">
                                    <div class="card-body">
                                        <h5 class="fw-bold text-primary"><i class="fas fa-route me-2"></i>Interstate Moves
                                        </h5>
                                        <p class="small text-muted">Long-distance moving services across state lines with
                                            proper licensing and insurance.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card border-0 shadow-sm">
                                    <div class="card-body">
                                        <h5 class="fw-bold text-primary"><i class="fas fa-box me-2"></i>Packing Services
                                        </h5>
                                        <p class="small text-muted">Professional packing and unpacking services to protect
                                            your belongings.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3 class="h4 fw-bold text-primary mt-4 mb-3">How to Choose the Right {{ $stateName }} Mover
                        </h3>
                        <ol>
                            <li class="mb-2"><strong>Get Multiple Quotes:</strong> Compare prices from at least 3
                                different companies</li>
                            <li class="mb-2"><strong>Check Reviews:</strong> Read customer reviews and ratings</li>
                            <li class="mb-2"><strong>Verify Licensing:</strong> Ensure the company is properly licensed
                                and insured</li>
                            <li class="mb-2"><strong>Ask Questions:</strong> Inquire about services, pricing, and
                                policies</li>
                            <li class="mb-2"><strong>Get Everything in Writing:</strong> Always get a written contract
                            </li>
                        </ol>

                        <div class="alert alert-warning mt-4">
                            <h5 class="alert-heading"><i class="fas fa-lightbulb me-2"></i>Pro Tip</h5>
                            <p class="mb-0">Book your {{ $stateName }} mover at least 4-6 weeks in advance,
                                especially during peak moving season (May-September).</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script>
        function calculateCost() {
            const from = document.getElementById('calc_from').value;
            const to = document.getElementById('calc_to').value;
            const size = document.getElementById('calc_size').value;
            const date = document.getElementById('calc_date').value;

            if (!from || !to || !size || !date) {
                alert('Please fill in all fields');
                return;
            }

            // Simple cost calculation (in real app, this would use actual distance API)
            const baseCosts = {
                'studio': 800,
                '1br': 1200,
                '2br': 1800,
                '3br': 2500,
                '4br': 3200,
                'office': 2000
            };

            const baseCost = baseCosts[size] || 1500;
            const distance = Math.floor(Math.random() * 500) + 100; // Mock distance
            const costPerMile = 2.5;
            const totalCost = baseCost + (distance * costPerMile);
            const duration = Math.ceil(distance / 300); // 300 miles per day

            document.getElementById('estimatedCost').textContent = '$' + totalCost.toLocaleString();
            document.getElementById('distance').textContent = distance + ' miles';
            document.getElementById('duration').textContent = duration + ' day' + (duration > 1 ? 's' : '');
            document.getElementById('costResult').classList.remove('d-none');
        }
    </script>
@endpush
