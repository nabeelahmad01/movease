<!-- Footer -->
<footer class="bg-dark text-white py-5 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="text-warning mb-3">
                    <i class="fas fa-truck me-2"></i>MoveEase
                </h5>
                <p class="text-light">Your trusted partner for stress-free moving experiences across the United States.</p>
                <div class="social-links">
                    <a href="#" class="text-white me-3 fs-4"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="text-white me-3 fs-4"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-white me-3 fs-4"><i class="fab fa-linkedin"></i></a>
                    <a href="#" class="text-white fs-4"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="text-warning mb-3">Moving Services</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="/movers" class="text-light text-decoration-none">Long Distance Moving</a></li>
                    <li class="mb-2"><a href="/movers" class="text-light text-decoration-none">Local Moving</a></li>
                    <li class="mb-2"><a href="/movers" class="text-light text-decoration-none">International Moving</a></li>
                    <li class="mb-2"><a href="/movers" class="text-light text-decoration-none">Storage Services</a></li>
                </ul>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="text-warning mb-3">Tools & Resources</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="/get-quote" class="text-light text-decoration-none">Moving Cost Calculator</a></li>
                    <li class="mb-2"><a href="/checklist" class="text-light text-decoration-none">Moving Checklist</a></li>
                    <li class="mb-2"><a href="/blog" class="text-light text-decoration-none">Moving Tips</a></li>
                    <li class="mb-2"><a href="/reviews" class="text-light text-decoration-none">Customer Reviews</a></li>
                </ul>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="text-warning mb-3">Company</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="/about" class="text-light text-decoration-none">About Us</a></li>
                    <li class="mb-2"><a href="/contact" class="text-light text-decoration-none">Contact</a></li>
                    <li class="mb-2"><a href="/add-listing" class="text-light text-decoration-none">Join Our Network</a></li>
                    <li class="mb-2"><a href="/admin/login" class="text-light text-decoration-none">Partner Portal</a></li>
                </ul>
            </div>
        </div>
        
        <hr class="my-4 border-secondary">
        
        <div class="row align-items-center">
            <div class="col-md-6">
                <p class="mb-0 text-light">
                    Copyright © {{ date('Y') }} MoveEase. All Rights Reserved.
                </p>
            </div>
            <div class="col-md-6 text-md-end">
                <div class="d-flex justify-content-md-end gap-3">
                    <a href="#" class="text-light text-decoration-none">Privacy Policy</a>
                    <a href="#" class="text-light text-decoration-none">Terms of Service</a>
                </div>
            </div>
        </div>
    </div>
</footer>

@push('styles')
<style>
.social-links a {
    transition: all 0.3s ease;
}
.social-links a:hover {
    color: #f39c12 !important;
    transform: translateY(-2px);
}
footer a:hover {
    color: #f39c12 !important;
}
</style>
@endpush
