@extends('frontend/layouts/frontend-master', ['title' => 'Team'])

@section('frontend')

  <x-breadcrumb title="Our Team" current="Team"/>
  <!-- End breadcrumb -->

    <!-- content -->
    <section class="lonyo-section-padding9">
    <div class="container">
      <div class="lonyo-section-title max-w616">
        <h2>Meet our brilliant team members</h2>
      </div>
      <div class="row">
        @foreach ($teams as $team)
          <div class="col-lg-3 col-md-6">
            <div class="lonyo-team-wrap" data-aos="fade-up" data-aos-duration="500">
              <div class="lonyo-team-thumb">
                <a href="{{ route('single.team', $team) }}">
                  <img
                           src="{{ $team->photo ? asset('uploads/team/' . $team->photo) : asset('uploads/no_image.jpg') }}"
                                   alt="Team Image" style="width: 306px; height: 400px;">
                </a>
              </div>
              <div class="lonyo-team-content2">
                <a href="{{ route('single.team', $team) }}">
                  <h6>{{ $team->name }}</h6>
                </a>
                <p>{{ $team->position }}</p>
              </div>
            </div>
          </div>
        @endforeach
      </div>
      <div class="mt-50 team-btn" data-aos="fade-up" data-aos-duration="700">
        <a href="contact-us.html" class="lonyo-default-btn team-btn2">Would you joint of our group?</a>
      </div>
    </div>
  </section>
  <!-- end content -->

  <div class="lonyo-content-shape">
    <img src="{{ asset('frontend') }}/assets/images/shape/shape2.svg" alt="">
  </div>

  @include('frontend/components/apps')

  <!-- end cta -->

@endsection