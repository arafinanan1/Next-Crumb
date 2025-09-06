@if(isset($reviews) && $reviews->count())
    <div class="text-center my-5 py-4"> <h2 class="mb-0">Reviews</h2> </div>
    <div class="row mt-3 mb-5" >
        <style> #testmonial { margin-top: 100px; /* visual gap from top */
         scroll-margin-top: 200px; /* when clicking navbar link */ } </style>
       
       
       @foreach($reviews as $review)

            <div class="col-md-4 my-3 my-md-0">
                <div class="testmonial-card">
                    <div class="card-box">
                        <h3 class="testmonial-title">{{ $review->name }}</h3>
                        <h6 class="testmonial-subtitle">Happy Customer</h6>
                        <h6 class="testmonial-subtitle" aria-label="Rating">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= (int) $review->rating)
                                    <span class="text-warning">&#9733;</span>
                                @else
                                    <span class="text-muted">&#9734;</span>
                                @endif
                            @endfor
                        </h6>
                        <div class="testmonial-body">
                            <p>{!! nl2br(e($review->review_text)) !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @if(method_exists($reviews, 'links'))
        <div class="d-flex justify-content-center mt-3">
            {{ $reviews->links() }}
        </div>
    @endif
@else
    <div class="row mt-3 mb-5">
        <div class="col-md-12 text-center">
            <p class="text-muted mb-0">No reviews yet. Be the first to write one!</p>
        </div>
    </div>
@endif
