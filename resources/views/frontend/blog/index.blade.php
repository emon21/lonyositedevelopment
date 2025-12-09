@extends('frontend/layouts/frontend-master', ['title' => 'Blog'])

@section('frontend')

    <x-breadcrumb title="Blog" current="Blog" />

    <!-- End breadcrumb -->

      <div class="overflow-hidden lonyo-section-padding9">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          @foreach ($blogs as $blog)
            <div class="lonyo-blog-wrap" data-aos="fade-up" data-aos-duration="500">
              <div class="lonyo-blog-thumb">
                <img src="{{ $blog->photo ? asset('uploads/blog/' . $blog->photo) : asset('uploads/no_image.jpg') }}" alt="Blog Image"
                          style="width: 746px; height: 500px;">
              </div>
              <div class="lonyo-blog-meta">
                <ul>
                  <li>
                    <a href="#"><img src="{{ asset('frontend') }}/assets/images/blog/date.svg" alt="">{{ Carbon\Carbon::parse($blog->created_at)->format('F d, Y') }}</a>

                  </li>
                  <li>
                    <a href="#"><img src="{{ asset('frontend') }}/assets/images/blog/clock.svg" alt="">5 min read</a>
                  </li>
                  <li>
                    <a href="#"><img src="{{ asset('frontend') }}/assets/images/blog/clock.svg" alt="">Comments ( {{ $blog->comments->count() }} )</a>
                  </li>
                </ul>
              </div>
              <div class="lonyo-blog-content">
                <h2><a href="{{ route('single-blog',$blog) }}">{{ $blog->title }}</a></h2>
                <p>{!! $blog->description !!}</p>
              </div>
              <div class="lonyo-blog-btn">
                <a href="{{ route('single-blog',$blog) }}" class="lonyo-default-btn blog-btn">Continue Reading</a>
              </div>
            </div>
           @endforeach

          <div class="lonyo-pagination center">
            <a class="pagi-btn btn2" href="single-blog.html">
              <svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.75 0.75L6 6L0.75 11.25" stroke="#001A3D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </a>
            <ul>
              <li><a class="current" href="#">1</a></li>
              <li><a href="single-blog.html">2</a></li>
              <li><a href="single-blog.html">3</a></li>
            </ul>
            <a class="pagi-btn" href="single-blog.html">
              <svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0.75 0.75L6 6L0.75 11.25" stroke="#001A3D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </a>
          </div>
        </div>

        <!-- blog sidebar -->

        @include('frontend/components/blog')

        <!-- blog sidebar -->

      </div>
    </div>
  </div>
  <!-- end blog -->
  <div class="lonyo-content-shape">
    <img src="{{ asset('frontend') }}/assets/images/shape/shape2.svg" alt="">
  </div>

  <section class="lonyo-cta-section bg-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="lonyo-cta-thumb" data-aos="fade-up" data-aos-duration="500">
            <img src="{{ asset('frontend') }}/assets/images/v1/cta-thumb.png" alt="">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="lonyo-default-content lonyo-cta-wrap" data-aos="fade-up" data-aos-duration="700">
            <h2>Start a new level of money management</h2>
            <p>Our finance apps and software are powerful tools for managing personal or business finances, helping users stay organized, track financial health, and make informed decisions.</p>
            <div class="lonyo-cta-info mt-50" data-aos="fade-up" data-aos-duration="900">
              <ul>
                <li>
                  <a href="https://www.apple.com/app-store/"><img src="{{ asset('frontend') }}/assets/images/v1/app-store.svg" alt=""></a>
                </li>
                <li>
                  <a href="https://playstore.com/"><img src="{{ asset('frontend') }}/assets/images/v1/play-store.svg" alt=""></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end cta -->

@endsection