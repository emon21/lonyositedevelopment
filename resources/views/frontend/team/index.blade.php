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
        <div class="col-lg-3 col-md-6">
          <div class="lonyo-team-wrap" data-aos="fade-up" data-aos-duration="500">
            <div class="lonyo-team-thumb">
              <a href="single-team.html"><img src="{{ asset ('frontend') }}/assets/images/about-us/t1.png" alt=""></a>
            </div>
            <div class="lonyo-team-content2">
              <a href="single-team.html">
                <h6>Michael Chen</h6>
              </a>
              <p>Chief Executive Officer</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="lonyo-team-wrap" data-aos="fade-up" data-aos-duration="700">
            <div class="lonyo-team-thumb">
              <a href="single-team.html"><img src="{{ asset ('frontend') }}/assets/images/about-us/t2.png" alt=""></a>
            </div>
            <div class="lonyo-team-content2">
              <a href="single-team.html">
                <h6>Alex Jonny</h6>
              </a>
              <p>Head of Product</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="lonyo-team-wrap" data-aos="fade-up" data-aos-duration="900">
            <div class="lonyo-team-thumb">
              <a href="single-team.html"><img src="{{ asset ('frontend') }}/assets/images/about-us/t3.png" alt=""></a>
            </div>
            <div class="lonyo-team-content2">
              <a href="single-team.html">
                <h6>William Smith</h6>
              </a>
              <p>Lead Software Engineer</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="lonyo-team-wrap" data-aos="fade-up" data-aos-duration="1100">
            <div class="lonyo-team-thumb">
              <a href="single-team.html"><img src="{{ asset ('frontend') }}/assets/images/about-us/t4.png" alt=""></a>
            </div>
            <div class="lonyo-team-content2">
              <a href="single-team.html">
                <h6>Frederick Taylor</h6>
              </a>
              <p>Data Security Officer</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="lonyo-team-wrap" data-aos="fade-up" data-aos-duration="500">
            <div class="lonyo-team-thumb">
              <a href="single-team.html"><img src="{{ asset ('frontend') }}/assets/images/about-us/t9.png" alt=""></a>
            </div>
            <div class="lonyo-team-content2">
              <a href="single-team.html">
                <h6>Liam Discord</h6>
              </a>
              <p>Chief Financial Officer</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="lonyo-team-wrap" data-aos="fade-up" data-aos-duration="700">
            <div class="lonyo-team-thumb">
              <a href="single-team.html"><img src="{{ asset ('frontend') }}/assets/images/about-us/t10.png" alt=""></a>
            </div>
            <div class="lonyo-team-content2">
              <a href="single-team.html">
                <h6>Alex Paul</h6>
              </a>
              <p>Chief Operating Officer</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="lonyo-team-wrap" data-aos="fade-up" data-aos-duration="900">
            <div class="lonyo-team-thumb">
              <a href="single-team.html"><img src="{{ asset ('frontend') }}/assets/images/about-us/t7.png" alt=""></a>
            </div>
            <div class="lonyo-team-content2">
              <a href="single-team.html">
                <h6>James Keith</h6>
              </a>
              <p>Technology Officer</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="lonyo-team-wrap" data-aos="fade-up" data-aos-duration="1100">
            <div class="lonyo-team-thumb">
              <a href="single-team.html"><img src="{{ asset ('frontend') }}/assets/images/about-us/t12.png" alt=""></a>
            </div>
            <div class="lonyo-team-content2">
              <a href="single-team.html">
                <h6>Sam Joe</h6>
              </a>
              <p>Software Engineer</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="lonyo-team-wrap" data-aos="fade-up" data-aos-duration="500">
            <div class="lonyo-team-thumb">
              <a href="single-team.html"><img src="{{ asset ('frontend') }}/assets/images/about-us/t5.png" alt=""></a>
            </div>
            <div class="lonyo-team-content2">
              <a href="single-team.html">
                <h6>Robert Arauco</h6>
              </a>
              <p>VP of Sales</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="lonyo-team-wrap" data-aos="fade-up" data-aos-duration="700">
            <div class="lonyo-team-thumb">
              <a href="single-team.html"><img src="{{ asset ('frontend') }}/assets/images/about-us/t6.png" alt=""></a>
            </div>
            <div class="lonyo-team-content2">
              <a href="single-team.html">
                <h6>Neil Hodgson</h6>
              </a>
              <p>Marketing Director</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="lonyo-team-wrap" data-aos="fade-up" data-aos-duration="900">
            <div class="lonyo-team-thumb">
              <a href="single-team.html"><img src="{{ asset ('frontend') }}/assets/images/about-us/t7.png" alt=""></a>
            </div>
            <div class="lonyo-team-content2">
              <a href="single-team.html">
                <h6>Clarke Kress</h6>
              </a>
              <p>Customer Success Manager</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="lonyo-team-wrap" data-aos="fade-up" data-aos-duration="1100">
            <div class="lonyo-team-thumb">
              <a href="single-team.html"><img src="{{ asset ('frontend') }}/assets/images/about-us/t8.png" alt=""></a>
            </div>
            <div class="lonyo-team-content2">
              <a href="single-team.html">
                <h6>Martine Smith</h6>
              </a>
              <p>Marketing Expert</p>
            </div>
          </div>
        </div>
      </div>
      <div class="mt-50 team-btn" data-aos="fade-up" data-aos-duration="700">
        <a href="contact-us.html" class="lonyo-default-btn team-btn2">Would you joint of our group?</a>
      </div>
    </div>
  </section>
  <!-- end content -->

  <div class="lonyo-content-shape">
    <img src="{{ asset ('frontend') }}/assets/images/shape/shape2.svg" alt="">
  </div>
  <section class="lonyo-cta-section bg-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="lonyo-cta-thumb" data-aos="fade-up" data-aos-duration="500">
            <img src="{{ asset ('frontend') }}/assets/images/v1/cta-thumb.png" alt="">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="lonyo-default-content lonyo-cta-wrap" data-aos="fade-up" data-aos-duration="700">
            <h2>Start a new level of money management</h2>
            <p>Our finance apps and software are powerful tools for managing personal or business finances, helping users stay organized, track financial health, and make informed decisions.</p>
            <div class="lonyo-cta-info mt-50" data-aos="fade-up" data-aos-duration="900">
              <ul>
                <li>
                  <a href="https://www.apple.com/app-store/"><img src="{{ asset ('frontend') }}/assets/images/v1/app-store.svg" alt=""></a>
                </li>
                <li>
                  <a href="https://playstore.com/"><img src="{{ asset ('frontend') }}/assets/images/v1/play-store.svg" alt=""></a>
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