@extends('layouts.master')
@section('title', $page->meta_title ?? $page->page_name . ' | MoveEase')
@push('styles')
    <link rel="stylesheet" href="{{ asset('/home.css') }}">
    <link rel="stylesheet" href="{{ asset('/resource.css') }}">
@endpush
@section('content')
    <section class="py-5 bg-light">
        <div class="container">
            <div class="col-lg-10 mx-auto">
                <div class="row">
                    <div class="col-lg-8">
                        <h1 class="fw-bold mb-2">{{ $page->page_name }}</h1>
                        @if ($page->meta_description)
                            <p class="text-muted mb-4">{{ $page->meta_description }}</p>
                        @endif

                        @if ($page->navbar_content)
                            <div class="mb-4">{!! $page->navbar_content !!}</div>
                        @endif
                    </div>
                    <div class="col-lg-4">

                    </div>
                </div>

                @if ($topMovers->count())
                    <!-- Featured Companies -->
                    <div class="container my-5">
                        <div class="row">
                            <div class="col-xl-10 mx-auto">
                                <h2 class="fw-bold text-center text-primary mb-5">
                                    Best Long Distance Moving Companies 2025
                                </h2>
                                <div class=" top-company-card border-0">
                                    <div class="row g-4 row g-4 justify-content-center">

                                        @foreach ($topMovers as $tm)
                                            <div class="col-lg-4 col-md-6 col-12 mt-4 ">
                                                <div class="company-box position-relative p-4 text-center h-100">

                                                    <!-- Ribbon only on first card -->
                                                    <span class="ribbon">{{ $tm->heading }}</span>
                                                    <div class="bg-shape"></div>

                                                    <div class="company_logo mx-auto">
                                                        <img src="https://mygoodmovers.com/public/companies/logo/distance-movers.jpg"
                                                            alt="Company Logo" class="w-100">
                                                    </div>
                                                    <div class="company_details px-3 mt-4">
                                                        <h5 class="mb-2">{{ $tm->company->name }}</h5>

                                                        <!-- Stars -->
                                                        <div class="stars mb-3">
                                                            <ul
                                                                class="list-unstyled stars_list m-0 mb-2 d-flex align-items-center justify-content-center">
                                                                <li><i class="fas fa-star" aria-hidden="true"></i></li>
                                                                <li><i class="fas fa-star" aria-hidden="true"></i></li>
                                                                <li><i class="fas fa-star" aria-hidden="true"></i></li>
                                                                <li><i class="fas fa-star" aria-hidden="true"></i></li>
                                                                <li><i class="fa fa-star-half-stroke"
                                                                        aria-hidden="true"></i>
                                                                </li>
                                                            </ul>
                                                        </div>

                                                        <ul class="list-unstyled card-li text-start">
                                                            @if ($tm->point_one)
                                                                <li><img src="https://mygoodmovers.com/assets/image/check-mark.png"
                                                                        alt="check-mark" width="13"
                                                                        height="13">{{ $tm->point_one }}</li>
                                                            @endif
                                                            @if ($tm->point_two)
                                                                <li><img src="https://mygoodmovers.com/assets/image/check-mark.png"
                                                                        alt="check-mark" width="13"
                                                                        height="13">{{ $tm->point_two }}</li>
                                                            @endif
                                                            @if ($tm->point_three)
                                                                <li><img src="https://mygoodmovers.com/assets/image/check-mark.png"
                                                                        alt="check-mark" width="13"
                                                                        height="13">{{ $tm->point_three }}</li>
                                                            @endif
                                                        </ul>
                                                        @if ($tm->phone)
                                                            <a href="tel:{{ $tm->phone }}"
                                                                class="btn btn-primary btn-sm">Call
                                                                {{ $tm->phone }}</a>
                                                        @endif
                                                        <div class="get-btn mt-3">
                                                            <a href="#">Get Quote</a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <h3 class="mt-4 mb-3">Recomended Movers</h3>
                    <div class="row g-3">
                        @foreach ($topMovers as $tm)
                            <div class="col-md-4">
                                <div class="card h-100 shadow-sm">
                                    <div class="card-body">
                                        <h5 class="card-title mb-1">{{ $tm->company->name }}</h5>
                                        <div class="text-muted small mb-2">Position: {{ $tm->position }}</div>
                                        @if ($tm->heading)
                                            <p class="fw-semibold">{{ $tm->heading }}</p>
                                        @endif
                                        <ul class="mb-3">
                                            @if ($tm->point_one)
                                                <li>{{ $tm->point_one }}</li>
                                            @endif
                                            @if ($tm->point_two)
                                                <li>{{ $tm->point_two }}</li>
                                            @endif
                                            @if ($tm->point_three)
                                                <li>{{ $tm->point_three }}</li>
                                            @endif
                                        </ul>
                                        @if ($tm->phone)
                                            <a href="tel:{{ $tm->phone }}" class="btn btn-primary btn-sm">Call
                                                {{ $tm->phone }}</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div> --}}
                @endif

                @if ($page->upper_content)
                    <div class="mt-5">{!! $page->upper_content !!}</div>
                @endif

                @if ($page->review_content)
                    <div class="mt-5">{!! $page->review_content !!}</div>
                @endif

                @if ($bottomMovers->count())
                    <h3 class="mt-5 mb-3">More Movers</h3>
                    <div class="row g-3">
                        {{-- <div class="col-md-6">
                                <div class="card h-100 shadow-sm">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <h5 class="card-title mb-0">{{ $bm->company->name }}</h5>
                                            @if ($bm->availability)
                                                <span class="badge bg-info text-dark">{{ $bm->availability }}</span>
                                            @endif
                                        </div>
                                        @if ($bm->heading)
                                            <p class="fw-semibold">{{ $bm->heading }}</p>
                                        @endif
                                        <ul>
                                            @if ($bm->point_one)
                                                <li>{{ $bm->point_one }}</li>
                                            @endif
                                            @if ($bm->point_two)
                                                <li>{{ $bm->point_two }}</li>
                                            @endif
                                            @if ($bm->point_three)
                                                <li>{{ $bm->point_three }}</li>
                                            @endif
                                        </ul>
                                        @if ($bm->content)
                                            <div class="mt-2">{!! $bm->content !!}</div>
                                        @endif
                                    </div>
                                </div>
                            </div> --}}
                    </div>
                    @foreach ($bottomMovers as $bm)
                        <div class="card mb-4 rounded-3 position-relative mover-card">
                            <!-- Corner Ribbon Badge -->
                            <div class="corner-ribbon">{{ $bm->position }}</div>

                            <div class="card-body">
                                <div class="row">
                                    <!-- Left Column -->
                                    <div class="col-md-4 border-end text-center">
                                        <img src="https://mygoodmovers.com/public/companies/logo/distance-movers.jpg"
                                            alt="United Van Lines" class="mb-3" style="max-height:50px;">
                                        <h5 class="fw-bold" style="color: #122b2e;">{{ $bm->company->name }}</h5>
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $bm->company->averageRating())
                                                <i class="fas fa-star text-warning"></i>
                                            @else
                                                <i class="far fa-star text-warning"></i>
                                            @endif
                                        @endfor
                                        <p class="mb-1 text-success fw-semibold">
                                            {{ number_format($bm->company->averageRating(), 1) }}/5
                                            ({{ $bm->company->reviews()->count() }}
                                            reviews)
                                        </p>
                                        <button class="btn w-100 text-white fw-semibold" style="background:#257180;">Get
                                            Started</button>

                                        <div class="d-flex align-items-center justify-content-center">
                                            <a class="text-decoration-none fw-semibold toggle-details"
                                                data-bs-toggle="collapse" href="#moverDetails" role="button"
                                                aria-expanded="false" aria-controls="moverDetails">
                                                Show details
                                            </a>
                                            <i class="bi bi-chevron-down toggle-icon ms-2" data-bs-toggle="collapse"
                                                href="#moverDetails"></i>
                                        </div>
                                    </div>

                                    <!-- Right Column -->
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-4 mb-3">
                                                <p class="fw-bold mb-1">Services offered</p>
                                                <p class="small text-muted">Packing, car shipping, unpacking, storage and
                                                    debris removal.</p>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <p class="fw-bold mb-1">Deposit required?</p>
                                                <p class="small text-muted">{{ $bm->deposit_required }}</p>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <p class="fw-bold mb-1">Customer ratings</p>
                                                <p class="small text-muted">Better than most<br>
                                                    <span class="small">Based on BBB rating and complaints per 100
                                                        vehicles</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Collapsible Content -->
                                <div class="collapse mt-3" id="moverDetails">
                                    <div class="mb-3">
                                        <h6 class="fw-bold">Key facts</h6>
                                        <p class="small text-muted mb-0">
                                            United Van Lines combines virtual walkthroughs, a digital move portal, and
                                            full-service options.
                                        </p>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6 class="fw-bold text-success">Pros</h6>
                                            <ul class="list-unstyled small">
                                                <li>✅ Does virtual walkthroughs for quotes</li>
                                                <li>✅ Full-service mover</li>
                                                <li>✅ Has online move portal</li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                            <h6 class="fw-bold text-danger">Cons</h6>
                                            <ul class="list-unstyled small">
                                                <li>❌ Only offers day-certain deliveries with Snapmoves Priority service
                                                </li>
                                                <li>❌ Website’s chatbot is relatively limited</li>
                                            </ul>
                                        </div>
                                    </div>
                                    {{-- @if ($bm->content)
                                            <div class="mt-2">{!! $bm->content !!}</div>
                                        @endif --}}
                                </div>
                            </div>
                        </div>
                    @endforeach

                @endif

                @if ($page->lower_content)
                    <div class="mt-5">{!! $page->lower_content !!}</div>
                @endif
            </div>
        </div>
    </section>
    <script>
        const toggleLink = document.querySelector('.toggle-details');
        const toggleIcon = document.querySelector('.toggle-icon');
        const collapseEl = document.getElementById('moverDetails');

        collapseEl.addEventListener('show.bs.collapse', () => {
            toggleIcon.classList.add('rotate');
            toggleLink.innerText = "Close details";
        });

        collapseEl.addEventListener('hide.bs.collapse', () => {
            toggleIcon.classList.remove('rotate');
            toggleLink.innerText = "Show details";
        });
    </script>
@endsection
