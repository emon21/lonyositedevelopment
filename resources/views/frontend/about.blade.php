@extends('frontend/layouts/frontend-master',['title' => 'About US'])

@section('frontend')

<x-breadcrumb title="About US" current="About" />

<!-- End breadcrumb -->

<div class="lonyo-section-padding10">
    <div class="container">
      <div class="row">
        <div class="col-xl-6">
          <div class="lonyo-about-us-wrap" data-aos="fade-up" data-aos-duration="700">
            <div class="lonyo-about-us-thumb">
              <img src="{{ asset('frontend')}}/assets/images/about-us/img1.png" alt="">
            </div>
            <div class="lonyo-about-us-thumb">
              <img src="{{ asset('frontend')}}/assets/images/about-us/img2.png" alt="">
              <div class="lonyo-about-us-card">
                <img src="{{ asset('frontend')}}/assets/images/about-us/card1.svg" alt="">
              </div>
            </div>
          </div>
          <div class="lonyo-about-us-thumb" data-aos="zoom-in" data-aos-duration="700">
            <img src="{{ asset('frontend')}}/assets/images/about-us/img3.png" alt="">
            <div class="lonyo-about-us-card2">
              <img src="{{ asset('frontend')}}/assets/images/about-us/card2.svg" alt="">
            </div>
          </div>
        </div>
        <div class="col-xl-6">
          <div class="lonyo-about-us-wrap">
            <div class="lonyo-about-us-thumb" data-aos="zoom-in" data-aos-duration="500">
              <img src="{{ asset('frontend')}}/assets/images/about-us/img4.png" alt="">
            </div>
            <div class="lonyo-about-us-thumb-wrap">
              <div class="lonyo-about-us-thumb">
                <img src="{{ asset('frontend')}}/assets/images/about-us/img5.png" alt="">

              </div>
              <div class="lonyo-about-us-thumb" data-aos="fade-up" data-aos-duration="700">
                <img src="{{ asset('frontend')}}/assets/images/about-us/img6.png" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end content -->

  <div class="lonyo-section-padding6">
    <div class="container">
      <div class="lonyo-section-title center">
        <p>We already have 25k+ positive reviews and ratings</p>
      </div>
      <div class="row">
        <div class="col-xl-4 col-lg-6">
          <div class="pt-0 lonyo-rating-wrap" data-aos="fade-right" data-aos-duration="500">
            <div class="lonyo-rating-icon">
              <img src="{{ asset('frontend')}}/assets/images/v3/star.svg" alt="">
            </div>
            <div class="lonyo-rating-content">
              <p>“Life-changing tool for budgeting! This app has completely transformed how I manage my money. Highly recommend!”</p>
              <span>4.5/5 rating from Michael Chen</span>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-6">
          <div class="pt-24 lonyo-rating-wrap" data-aos="fade-up" data-aos-duration="500">
            <div class="lonyo-rating-icon">
              <img src="{{ asset('frontend')}}/assets/images/v3/star.svg" alt="">
            </div>
            <div class="lonyo-rating-content">
              <p>“It save money more than I expected! With this software, I can stick to my budget. Goal-setting features are highly motivating!”</p>
              <span>4.5/5 rating from Adam Smith</span>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-6">
          <div class="lonyo-rating-wrap" data-aos="fade-left" data-aos-duration="500">
            <div class="lonyo-rating-icon">
              <img src="{{ asset('frontend')}}/assets/images/v3/star.svg" alt="">
            </div>
            <div class="lonyo-rating-content">
              <p>““Great for tracking and organizing finances! I can see all my expenses in one place and set limits. It helped me avoid overspending.”</p>
              <span>4.5/5 rating from David Nguyen</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end rating -->

  <div class="lonyo-section-padding3">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="lonyo-about-us-thumb2 pr-51" data-aos="fade-up" data-aos-duration="700">
            <img src="{{ asset('frontend')}}/assets/images/about-us/img7.png" alt="">
          </div>
        </div>
        <div class="col-lg-7 d-flex align-items-center">
          <div class="pl-32 lonyo-default-content" data-aos="fade-up" data-aos-duration="900">
            <h2>Our mission is to bring financial wellness</h2>
            <p>We believe financial wellness is key to a better life. Our mission is to empower individuals and businesses with the tools they need to understand, manage, and grow their financial health.</p>
            <p>With our app, you can easily track spending, set budgets, automate savings, and get real-time insights into your financial world. </p>
            <p>For businesses, our software offers seamless integration with your existing tools to ensure that your accounting, invoicing, and financial reporting are effortless and organized.</p>
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
            <p class="max-w616">Our core values ​​are at the core of everything we do. Ensuring the integrity, security and privacy of your data. Innovation, providing cutting-edge tools to simplify financial management. </p>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="lonyo-about-us-feature-wrap one" data-aos="fade-up" data-aos-duration="500">
            <div class="lonyo-about-us-feature-icon">
              <img src="{{ asset('frontend')}}/assets/images/about-us/icon1.svg" alt="">
            </div>
            <div class="lonyo-about-us-feature-content">
              <h4>User-Centric Innovation</h4>
              <p>We design our apps and software with our users in mind, constantly evolving to meet their financial needs and solutions.</p>
            </div>
          </div>
          <div class="lonyo-about-us-feature-wrap two" data-aos="fade-up" data-aos-duration="700">
            <div class="lonyo-about-us-feature-icon">
              <img src="{{ asset('frontend')}}/assets/images/about-us/icon2.svg" alt="">
            </div>
            <div class="lonyo-about-us-feature-content">
              <h4>Transparency</h4>
              <p>We believe in clear communication and full transparency in all our practices, providing users with accurate financial insights.</p>
            </div>
          </div>
          <div class="lonyo-about-us-feature-wrap three" data-aos="fade-up" data-aos-duration="900">
            <div class="lonyo-about-us-feature-icon">
              <img src="{{ asset('frontend')}}/assets/images/about-us/icon3.svg" alt="">
            </div>
            <div class="lonyo-about-us-feature-content">
              <h4>Integrity & Trust</h4>
              <p>We build lasting relationships with our users by consistently delivering reliable, ethical, and also trustworthy services.</p>
            </div>
          </div>
          <div class="mb-0 lonyo-about-us-feature-wrap four" data-aos="fade-up" data-aos-duration="1100">
            <div class="lonyo-about-us-feature-icon">
              <img src="{{ asset('frontend')}}/assets/images/about-us/icon4.svg" alt="">
            </div>
            <div class="lonyo-about-us-feature-content">
              <h4>Security You Can Trust</h4>
              <p>Your financial data is protected with top-level encryption and security protocols to ensure your information is always secure.</p>
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
      <div class="row">
        <div class="col-lg-3 col-md-6">
          <div class="lonyo-team-wrap" data-aos="fade-up" data-aos-duration="500">
            <div class="lonyo-team-thumb">
              <a href="single-team.html"><img src="{{ asset('frontend')}}/assets/images/about-us/t1.png" alt=""></a>
            </div>
            <div class="lonyo-team-content">
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
              <a href="single-team.html"><img src="{{ asset('frontend')}}/assets/images/about-us/t2.png" alt=""></a>
            </div>
            <div class="lonyo-team-content">
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
              <a href="single-team.html"><img src="{{ asset('frontend')}}/assets/images/about-us/t3.png" alt=""></a>
            </div>
            <div class="lonyo-team-content">
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
              <a href="single-team.html"><img src="{{ asset('frontend')}}/assets/images/about-us/t4.png" alt=""></a>
            </div>
            <div class="lonyo-team-content">
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
              <a href="single-team.html"><img src="{{ asset('frontend')}}/assets/images/about-us/t5.png" alt=""></a>
            </div>
            <div class="lonyo-team-content">
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
              <a href="single-team.html"><img src="{{ asset('frontend')}}/assets/images/about-us/t6.png" alt=""></a>
            </div>
            <div class="lonyo-team-content">
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
              <a href="single-team.html"><img src="{{ asset('frontend')}}/assets/images/about-us/t7.png" alt=""></a>
            </div>
            <div class="lonyo-team-content">
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
              <a href="single-team.html"><img src="{{ asset('frontend')}}/assets/images/about-us/t8.png" alt=""></a>
            </div>
            <div class="lonyo-team-content">
              <a href="single-team.html">
                <h6>Martine Smith</h6>
              </a>
              <p>Marketing Expert</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end team -->

  <div class="lonyo-section-padding4 section">
    <div class="container">
      <div class="lonyo-section-title center">
        <h2>Find answers to all questions below</h2>
      </div>
      <div class="lonyo-faq-wrap1">
        <div class="lonyo-faq-item item2 open" data-aos="fade-up" data-aos-duration="500">
          <div class="lonyo-faq-header">
            <h4>Is my financial data safe and secure?</h4>
            <div class="lonyo-active-icon">
              <img class="plasicon" src="assets/images/v1/mynus.svg" alt="">
              <img class="mynusicon" src="assets/images/v1/plas.svg" alt="">
            </div>
          </div>
          <div class="lonyo-faq-body body2">
            <p>Yes, this finance apps use bank-level encryption, multi-factor authentication, and other security measures to protect your sensitive information.</p>
          </div>
        </div>
        <div class="lonyo-faq-item item2" data-aos="fade-up" data-aos-duration="700">
          <div class="lonyo-faq-header">
            <h4>Can I link multiple bank accounts and credit cards?</h4>
            <div class="lonyo-active-icon">
              <img class="plasicon" src="assets/images/v1/mynus.svg" alt="">
              <img class="mynusicon" src="assets/images/v1/plas.svg" alt="">
            </div>
          </div>
          <div class="lonyo-faq-body body2">
            <p>Yes, this finance apps use bank-level encryption, multi-factor authentication, and other security measures to protect your sensitive information.</p>
          </div>
        </div>
        <div class="lonyo-faq-item item2" data-aos="fade-up" data-aos-duration="900">
          <div class="lonyo-faq-header">
            <h4>How does the app help me stick to my budget?</h4>
            <div class="lonyo-active-icon">
              <img class="plasicon" src="assets/images/v1/mynus.svg" alt="">
              <img class="mynusicon" src="assets/images/v1/plas.svg" alt="">
            </div>
          </div>
          <div class="lonyo-faq-body body2">
            <p>Yes, this finance apps use bank-level encryption, multi-factor authentication, and other security measures to protect your sensitive information.</p>
          </div>
        </div>
        <div class="lonyo-faq-item item2" data-aos="fade-up" data-aos-duration="1100">
          <div class="lonyo-faq-header">
            <h4>Can I track my investments with the app?</h4>
            <div class="lonyo-active-icon">
              <img class="plasicon" src="assets/images/v1/mynus.svg" alt="">
              <img class="mynusicon" src="assets/images/v1/plas.svg" alt="">
            </div>
          </div>
          <div class="lonyo-faq-body body2">
            <p>Yes, this finance apps use bank-level encryption, multi-factor authentication, and other security measures to protect your sensitive information.</p>
          </div>
        </div>
        <div class="lonyo-faq-item item2" data-aos="fade-up" data-aos-duration="1300">
          <div class="lonyo-faq-header">
            <h4>Is the app free, or are there subscription fees?</h4>
            <div class="lonyo-active-icon">
              <img class="plasicon" src="assets/images/v1/mynus.svg" alt="">
              <img class="mynusicon" src="assets/images/v1/plas.svg" alt="">
            </div>
          </div>
          <div class="lonyo-faq-body body2">
            <p>Yes, this finance apps use bank-level encryption, multi-factor authentication, and other security measures to protect your sensitive information.</p>
          </div>
        </div>
      </div>
      <div class="faq-btn" data-aos="fade-up" data-aos-duration="700">
        <a class="lonyo-default-btn faq-btn2" href="contact-us.html">Can't find your answer,</a>
      </div>
    </div>
  </div>
  <!-- end faq -->

  <div class="lonyo-content-shape">
    <img src="{{ asset('frontend')}}/assets/images/shape/shape2.svg" alt="">
  </div>

  <section class="lonyo-cta-section bg-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="lonyo-cta-thumb" data-aos="fade-up" data-aos-duration="500">
            <img src="{{ asset('frontend')}}/assets/images/v1/cta-thumb.png" alt="">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="lonyo-default-content lonyo-cta-wrap" data-aos="fade-up" data-aos-duration="700">
            <h2>Start a new level of money management</h2>
            <p>Our finance apps and software are powerful tools for managing personal or business finances, helping users stay organized, track financial health, and make informed decisions.</p>
            <div class="lonyo-cta-info mt-50" data-aos="fade-up" data-aos-duration="900">
              <ul>
                <li>
                  <a href="https://www.apple.com/app-store/"><img src="{{ asset('frontend')}}/assets/images/v1/app-store.svg" alt=""></a>
                </li>
                <li>
                  <a href="https://playstore.com/"><img src="{{ asset('frontend')}}/assets/images/v1/play-store.svg" alt=""></a>
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