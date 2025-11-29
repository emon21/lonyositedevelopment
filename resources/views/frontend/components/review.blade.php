<div class="overflow-hidden lonyo-section-padding position-relative">
  <div class="container">
    <div class="lonyo-section-title">
      <div class="row">
        <div class="col-xl-8 col-lg-8">
          <h2>Don't take our word for it, check user reviews</h2>
        </div>
        <div class="col-xl-4 col-lg-4 d-flex align-items-center justify-content-end">
          <div class="lonyo-title-btn">
            <a class="lonyo-default-btn t-btn" href="contact-us.html">Read Customer Stories</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="lonyo-testimonial-slider-init">
    @php

$reviews = App\models\Review::latest()->get();

    @endphp

    @foreach($reviews as $review)
      <div class="lonyo-t-wrap wrap2 light-bg">
        <div class="lonyo-t-ratting">
          <img src="{{ asset('frontend') }}/assets/images/shape/star.svg" alt="">
        </div>
        <div class="lonyo-t-text">
          <p>{{ $review->message }}</p>
        </div>
        <div class="lonyo-t-author">
          <div class="lonyo-t-author-thumb">
            {{-- <img src="{{ asset('frontend') }}/assets/images/v1/img7.png" alt=""> --}}
            <img
                src="{{ $review->photo ? asset('uploads/review/' . $review->photo) : asset('uploads/no_image.jpg') }}"
                alt="Review Image" style="width: 80px; height: 50px;">

          </div>
          <div class="lonyo-t-author-data">
            <p>{{ $review->name }}</p>
            <span>{{ $review->position }}</span>
          </div>
        </div>
      </div>
    @endforeach

  </div>
  <div class="lonyo-t-overlay2">
    <img src="{{ asset('frontend') }}/assets/images/v2/overlay.png" alt="">
  </div>
</div>