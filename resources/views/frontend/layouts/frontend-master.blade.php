<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title ?? 'Lonyo - IT Solution & Technology Temaptle' }}</title>

  <link rel="shortcut icon" href="{{ asset('frontend') }}/assets/images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="{{ asset('frontend') }}/assets/images/favicon.ico" type="image/x-icon">
  <!--- End favicon-->

  <link href="https://fonts.googleapis.com/css2?family=Afacad:ital,wght@0,400..700;1,400..700&family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Instrument+Sans:ital,wght@0,400..700;1,400..700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

  <!-- End google font  -->
  
  <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/magnific-popup.css">
  <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/slick.css">
  <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/fontawesome.css">
  <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/remixicon.css">
  <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/aos.css">
  <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/niceselect.css">
  <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/animate.min.css">

  <!-- Code Editor  -->

  <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/main.css">
  <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/app.min.css">


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

</head>
<body>

  <div class="preloader">
    <div class="preloader-inner">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <!-- End preloader -->

  <div class="progress-bar-container">
    <div class="progress-bar"></div>
  </div>

  <!-- progress circle -->
  <div class="paginacontainer">
    <div class="progress-wrap">
      <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
      </svg>
      <div class="top-arrow">
        <svg width="12" height="20" viewBox="0 0 9 16" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M0.999999 1L8 8L1 15" stroke="#142D6F" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round" />
        </svg>
      </div>
    </div>
  </div>
  <!-- End All Js -->

  <!-- Mobile Menu -->
  <div class="lonyo-menu-wrapper">
    <div class="text-center lonyo-menu-area">
      <div class="lonyo-menu-mobile-top">
        <div class="mobile-logo">
          <a href="index.html">
            <img src="{{ asset('frontend') }}/assets/images/logo/logo-dark.svg" alt="logo">
          </a>
        </div>
        <button class="lonyo-menu-toggle mobile">
          <i class="ri-close-line"></i>
        </button>
      </div>
      <div class="lonyo-mobile-menu">
        <ul>
              <li>
                <a href="{{ url('/') }}">Home</a>
              </li>

              <li class="menu-item-has-children">
                <a href="#">About Us</a>
                <ul class="sub-menu">
                  <li><a href="{{ url('/about-us') }}">Company Profile</a></li>
                  <li><a href="{{ url('/pricing') }}">Team</a></li>              
                </ul>
              </li>
              <li>
                <a href="#">Our Service</a>
              </li> 
              <li>
                <a href="#">Portfolio</a>
              </li>
              <li>
                <a href="#">Blog</a>
              </li>
              <li>
                <a href="contact-us.html">Contact</a>
              </li>
            </ul>
      </div>
      <div class="lonyo-mobile-menu-btn">
        <a class="lonyo-default-btn sm-size" href="contact-us.html" data-text="Get in Touch"><span
            class="btn-wraper">Get in Touch</span></a>
        <a class="lonyo-default-btn sm-size" href="contact-us.html" data-text="Get in Touch"><span
            class="btn-wraper">Get in Touch</span></a>
      </div>
    </div>
  </div>
  <!-- End mobile menu -->

  <!--  Navbar -->
  
  @include('frontend/partials/header')

  <!-- End Navbar -->

  @yield('frontend')

  <!-- Footer  -->

  {{-- @include('frontend.layouts.partials.footer') --}}
  @include('frontend/partials/footer')
    
   <!-- Footer  -->

 

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>

  // @if(Session::has('message'))
  //   toastr["{{ Session::get('alert-type') }}"](
  //   "{{ Session::get('message') }}",
  //   );
  // @endif
</script>


<!-- Axios CDN -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

 <!-- scripts -->
 @stack('frontend-js')

</body>
</html>