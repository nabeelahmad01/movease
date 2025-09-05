@props(['faqs' => [], 'title' => 'Frequently Asked Questions'])

<section class="faq-section">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold">{{ $title }}</h2>
            <p class="lead">Get answers to common questions</p>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="accordion" id="faqAccordion">
                    @forelse($faqs as $index => $faq)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq{{ $index }}">
                            <button class="accordion-button {{ $index === 0 ? '' : 'collapsed' }}" type="button" 
                                    data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" 
                                    aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $index }}">
                                {{ $faq['question'] }}
                            </button>
                        </h2>
                        <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" 
                             aria-labelledby="faq{{ $index }}" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                {{ $faq['answer'] }}
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="text-center">
                        <p class="text-muted">No FAQs available at the moment.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.faq-section {
    padding: 80px 0;
    background: #f8f9fa;
}

.accordion-item {
    border: none;
    margin-bottom: 1rem;
    border-radius: 10px !important;
    overflow: hidden;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.accordion-button {
    background: white;
    border: none;
    padding: 1.5rem;
    font-weight: 600;
    color: #2c3e50;
    border-radius: 10px !important;
    box-shadow: none;
}

.accordion-button:not(.collapsed) {
    background: #3b82f6;
    color: white;
    box-shadow: none;
}

.accordion-button:focus {
    box-shadow: none;
    border: none;
}

.accordion-button::after {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23212529'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
}

.accordion-button:not(.collapsed)::after {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23ffffff'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
}

.accordion-body {
    padding: 1.5rem;
    background: white;
    color: #64748b;
    line-height: 1.6;
}
</style>
