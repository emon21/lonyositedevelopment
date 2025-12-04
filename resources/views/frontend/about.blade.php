@extends('frontend/layouts/frontend-master', ['title' => 'About US'])
@section('frontend')

  <x-breadcrumb title="About US" current="About" />

  <!-- End breadcrumb -->

  @php
  $about = App\Models\About::first();
  @endphp

  <div class=" lonyo-section-padding3">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 mt-5">
          <div class="lonyo-about-us-thumb2 pr-51 aos-init aos-animate" data-aos="fade-up" data-aos-duration="700">
            <img src="{{ asset('uploads/about/'. $about->photo)}}" style="width:526px;height:550px" alt="">
          </div>
        </div>
        <div class="col-lg-7 d-flex align-items-center">
          <div class="pl-32 lonyo-default-content aos-init aos-animate" data-aos="fade-up" data-aos-duration="900">
            <h2>{{ $about->title }}</h2>
            <p>{!! $about->description !!}</p>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- end -->

  <section class="lonyo-section-padding3 position-relative">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <div class="lonyo-default-content pr-50 feature-wrap">
            <h2>Our core values ​​serve as our driving force</h2>
            <p class="max-w616">Our core values ​​are at the core of everything we do. Ensuring the integrity, security
              and privacy of your data. Innovation, providing cutting-edge tools to simplify financial management. </p>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="lonyo-about-us-feature-wrap one" data-aos="fade-up" data-aos-duration="500">
            <div class="lonyo-about-us-feature-icon">
              <img src="{{ asset('frontend')}}/assets/images/about-us/icon1.svg" alt="">
            </div>
            <div class="lonyo-about-us-feature-content">
              <h4>User-Centric Innovation</h4>
              <p>We design our apps and software with our users in mind, constantly evolving to meet their financial needs
                and solutions.</p>
            </div>
          </div>
          <div class="lonyo-about-us-feature-wrap two" data-aos="fade-up" data-aos-duration="700">
            <div class="lonyo-about-us-feature-icon">
              <img src="{{ asset('frontend')}}/assets/images/about-us/icon2.svg" alt="">
            </div>
            <div class="lonyo-about-us-feature-content">
              <h4>Transparency</h4>
              <p>We believe in clear communication and full transparency in all our practices, providing users with
                accurate financial insights.</p>
            </div>
          </div>
          <div class="lonyo-about-us-feature-wrap three" data-aos="fade-up" data-aos-duration="900">
            <div class="lonyo-about-us-feature-icon">
              <img src="{{ asset('frontend')}}/assets/images/about-us/icon3.svg" alt="">
            </div>
            <div class="lonyo-about-us-feature-content">
              <h4>Integrity & Trust</h4>
              <p>We build lasting relationships with our users by consistently delivering reliable, ethical, and also
                trustworthy services.</p>
            </div>
          </div>
          <div class="mb-0 lonyo-about-us-feature-wrap four" data-aos="fade-up" data-aos-duration="1100">
            <div class="lonyo-about-us-feature-icon">
              <img src="{{ asset('frontend')}}/assets/images/about-us/icon4.svg" alt="">
            </div>
            <div class="lonyo-about-us-feature-content">
              <h4>Security You Can Trust</h4>
              <p>Your financial data is protected with top-level encryption and security protocols to ensure your
                information is always secure.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="lonyo-feature-shape shape2"></div>
  </section>
  <!-- end feature -->

  <div class="lonyo-section-padding10 team-section">
    <div class="shape">
      <img src="{{ asset('frontend')}}/assets/images/about-us/shape1.svg" alt="">
    </div>
    <div class="container">
      <div class="lonyo-section-title center max-width-750">
        <h2>We always believe in the strength of our team</h2>
      </div>

        @php
          $teams = App\Models\Team::latest()->get();
        @endphp
      <div class="row">
        @foreach ($teams as $team)
          <div class="col-lg-3 col-md-6">
            <div class="lonyo-team-wrap" data-aos="fade-up" data-aos-duration="500">
              <div class="lonyo-team-thumb">
                <a href="{{ route('single.team', $team) }}">
                <img src="{{ asset('uploads/team/' . $team->photo)}}" alt="{{ $team->name }}" style="width:500px;height:520px"></a>
              </div>
              <div class="lonyo-team-content">
                <a href="{{ route('single.team', $team) }}">
                  <h6>{{ $team->name }}</h6>
                </a>
                <p>{{$team->position}}</p>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
  <!-- end team -->

  @include('frontend/components/answer')
  <!-- end faq -->

  @include('frontend/components/apps')
  <!-- end cta -->

@endsection