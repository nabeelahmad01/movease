@extends('layouts.master')
@section('title', 'Moving Checklist | MoveEase')
@section('content')

    @push('styles')
        <style>
            .checklist-hero {
                background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
                color: white;
                padding: 100px 0 80px;
                position: relative;
                overflow: hidden;
            }

            .checklist-hero::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="0.5"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
                opacity: 0.3;
            }

            .checklist-hero-content {
                position: relative;
                z-index: 2;
                text-align: center;
            }

            .checklist-hero h1 {
                font-family: 'Poppins', sans-serif;
                font-size: 3.5rem;
                font-weight: 700;
                margin-bottom: 1rem;
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            }

            .checklist-content {
                padding: 80px 0;
            }

            .checklist-section {
                background: white;
                border-radius: 15px;
                padding: 30px;
                margin-bottom: 30px;
                box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            }

            .checklist-section h3 {
                color: var(--primary-color);
                font-family: 'Poppins', sans-serif;
                font-weight: 600;
                margin-bottom: 20px;
                display: flex;
                align-items: center;
                gap: 10px;
            }

            .checklist-item {
                display: flex;
                align-items: flex-start;
                gap: 15px;
                padding: 15px 0;
                border-bottom: 1px solid #e9ecef;
            }

            .checklist-item:last-child {
                border-bottom: none;
            }

            .checklist-checkbox {
                width: 20px;
                height: 20px;
                border: 2px solid var(--primary-color);
                border-radius: 4px;
                cursor: pointer;
                flex-shrink: 0;
                margin-top: 2px;
                transition: all 0.3s ease;
            }

            .checklist-checkbox:hover {
                background: rgba(44, 62, 80, 0.1);
            }

            .checklist-checkbox.checked {
                background: var(--primary-color);
                color: white;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .checklist-text {
                flex: 1;
            }

            .checklist-text h6 {
                margin-bottom: 5px;
                font-weight: 600;
                color: var(--dark-text);
            }

            .checklist-text p {
                margin: 0;
                color: var(--light-text);
                font-size: 0.9rem;
            }

            .timeline-badge {
                background: var(--secondary-color);
                color: white;
                padding: 4px 12px;
                border-radius: 20px;
                font-size: 0.8rem;
                font-weight: 500;
                display: inline-block;
                margin-bottom: 10px;
            }
        </style>
    @endpush

    <!-- Hero Section -->
    <section class="checklist-hero">
        <div class="container">
            <div class="checklist-hero-content">
                <h1>Moving Checklist</h1>
                <p class="lead">Your complete guide to a stress-free move</p>
            </div>
        </div>
    </section>

    <!-- Checklist Content -->
    <section class="checklist-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <!-- 8 Weeks Before -->
                    <div class="checklist-section">
                        <div class="timeline-badge">8 Weeks Before</div>
                        <h3><i class="fas fa-calendar-alt"></i>Start Planning</h3>
                        <div class="checklist-item">
                            <div class="checklist-checkbox" onclick="toggleCheck(this)"></div>
                            <div class="checklist-text">
                                <h6>Research Moving Companies</h6>
                                <p>Get quotes from at least 3 licensed moving companies and compare services</p>
                            </div>
                        </div>
                        <div class="checklist-item">
                            <div class="checklist-checkbox" onclick="toggleCheck(this)"></div>
                            <div class="checklist-text">
                                <h6>Set Moving Budget</h6>
                                <p>Determine your moving budget including all potential costs</p>
                            </div>
                        </div>
                        <div class="checklist-item">
                            <div class="checklist-checkbox" onclick="toggleCheck(this)"></div>
                            <div class="checklist-text">
                                <h6>Create Moving Binder</h6>
                                <p>Organize all moving-related documents and information</p>
                            </div>
                        </div>
                    </div>

                    <!-- 6 Weeks Before -->
                    <div class="checklist-section">
                        <div class="timeline-badge">6 Weeks Before</div>
                        <h3><i class="fas fa-handshake"></i>Book Services</h3>
                        <div class="checklist-item">
                            <div class="checklist-checkbox" onclick="toggleCheck(this)"></div>
                            <div class="checklist-text">
                                <h6>Book Your Moving Company</h6>
                                <p>Confirm your moving date and services with your chosen company</p>
                            </div>
                        </div>
                        <div class="checklist-item">
                            <div class="checklist-checkbox" onclick="toggleCheck(this)"></div>
                            <div class="checklist-text">
                                <h6>Order Packing Supplies</h6>
                                <p>Get boxes, tape, bubble wrap, and other packing materials</p>
                            </div>
                        </div>
                        <div class="checklist-item">
                            <div class="checklist-checkbox" onclick="toggleCheck(this)"></div>
                            <div class="checklist-text">
                                <h6>Start Decluttering</h6>
                                <p>Decide what to keep, donate, sell, or throw away</p>
                            </div>
                        </div>
                    </div>

                    <!-- 4 Weeks Before -->
                    <div class="checklist-section">
                        <div class="timeline-badge">4 Weeks Before</div>
                        <h3><i class="fas fa-file-alt"></i>Handle Paperwork</h3>
                        <div class="checklist-item">
                            <div class="checklist-checkbox" onclick="toggleCheck(this)"></div>
                            <div class="checklist-text">
                                <h6>Change Your Address</h6>
                                <p>Submit change of address form with postal service</p>
                            </div>
                        </div>
                        <div class="checklist-item">
                            <div class="checklist-checkbox" onclick="toggleCheck(this)"></div>
                            <div class="checklist-text">
                                <h6>Transfer Utilities</h6>
                                <p>Arrange disconnection at old home and connection at new home</p>
                            </div>
                        </div>
                        <div class="checklist-item">
                            <div class="checklist-checkbox" onclick="toggleCheck(this)"></div>
                            <div class="checklist-text">
                                <h6>Update Insurance</h6>
                                <p>Contact insurance providers for home, auto, and health coverage</p>
                            </div>
                        </div>
                    </div>

                    <!-- 2 Weeks Before -->
                    <div class="checklist-section">
                        <div class="timeline-badge">2 Weeks Before</div>
                        <h3><i class="fas fa-boxes"></i>Start Packing</h3>
                        <div class="checklist-item">
                            <div class="checklist-checkbox" onclick="toggleCheck(this)"></div>
                            <div class="checklist-text">
                                <h6>Pack Non-Essential Items</h6>
                                <p>Start with items you won't need in the next few weeks</p>
                            </div>
                        </div>
                        <div class="checklist-item">
                            <div class="checklist-checkbox" onclick="toggleCheck(this)"></div>
                            <div class="checklist-text">
                                <h6>Label Boxes Clearly</h6>
                                <p>Mark each box with contents and destination room</p>
                            </div>
                        </div>
                        <div class="checklist-item">
                            <div class="checklist-checkbox" onclick="toggleCheck(this)"></div>
                            <div class="checklist-text">
                                <h6>Confirm Moving Details</h6>
                                <p>Verify time, date, and logistics with your moving company</p>
                            </div>
                        </div>
                    </div>

                    <!-- 1 Week Before -->
                    <div class="checklist-section">
                        <div class="timeline-badge">1 Week Before</div>
                        <h3><i class="fas fa-clock"></i>Final Preparations</h3>
                        <div class="checklist-item">
                            <div class="checklist-checkbox" onclick="toggleCheck(this)"></div>
                            <div class="checklist-text">
                                <h6>Pack Essential Box</h6>
                                <p>Pack items you'll need immediately at your new home</p>
                            </div>
                        </div>
                        <div class="checklist-item">
                            <div class="checklist-checkbox" onclick="toggleCheck(this)"></div>
                            <div class="checklist-text">
                                <h6>Confirm Arrangements</h6>
                                <p>Double-check all moving day arrangements and schedules</p>
                            </div>
                        </div>
                        <div class="checklist-item">
                            <div class="checklist-checkbox" onclick="toggleCheck(this)"></div>
                            <div class="checklist-text">
                                <h6>Pack Cleaning Supplies</h6>
                                <p>Prepare supplies for cleaning both old and new homes</p>
                            </div>
                        </div>
                    </div>

                    <!-- Moving Day -->
                    <div class="checklist-section">
                        <div class="timeline-badge">Moving Day</div>
                        <h3><i class="fas fa-truck"></i>The Big Day</h3>
                        <div class="checklist-item">
                            <div class="checklist-checkbox" onclick="toggleCheck(this)"></div>
                            <div class="checklist-text">
                                <h6>Be Present for Movers</h6>
                                <p>Be available to answer questions and provide directions</p>
                            </div>
                        </div>
                        <div class="checklist-item">
                            <div class="checklist-checkbox" onclick="toggleCheck(this)"></div>
                            <div class="checklist-text">
                                <h6>Check Inventory</h6>
                                <p>Review and sign the inventory list before movers leave</p>
                            </div>
                        </div>
                        <div class="checklist-item">
                            <div class="checklist-checkbox" onclick="toggleCheck(this)"></div>
                            <div class="checklist-text">
                                <h6>Keep Important Documents</h6>
                                <p>Carry important documents and valuables with you</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            function toggleCheck(element) {
                element.classList.toggle('checked');
                if (element.classList.contains('checked')) {
                    element.innerHTML = '<i class="fas fa-check"></i>';
                } else {
                    element.innerHTML = '';
                }

                // Save to localStorage
                const checkedItems = document.querySelectorAll('.checklist-checkbox.checked');
                const checkedIds = Array.from(checkedItems).map((item, index) => index);
                localStorage.setItem('moveease_checklist', JSON.stringify(checkedIds));
            }

            // Load saved progress
            document.addEventListener('DOMContentLoaded', function() {
                const saved = localStorage.getItem('moveease_checklist');
                if (saved) {
                    const checkedIds = JSON.parse(saved);
                    const checkboxes = document.querySelectorAll('.checklist-checkbox');
                    checkedIds.forEach(id => {
                        if (checkboxes[id]) {
                            checkboxes[id].classList.add('checked');
                            checkboxes[id].innerHTML = '<i class="fas fa-check"></i>';
                        }
                    });
                }
            });
        </script>
    @endpush

@endsection
