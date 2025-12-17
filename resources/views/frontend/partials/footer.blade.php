
  <footer class="lonyo-footer-section light-bg">
    <div class="container">
      <div class="lonyo-footer-one">
        <div class="row">
          <div class="col-xxl-4 col-xl-12 col-md-6">
            <div class="lonyo-footer-textarea">
              <a href="/">
                {{-- <img src="{{ asset('frontend') }}/assets/images/logo/logo-dark.svg" alt=""> --}}
                <img id="logo-preview" src="{{ !empty($settings['site_logo']) && file_exists(public_path($settings['site_logo']))
      ? asset($settings['site_logo'])
      : asset('uploads/no_image.jpg') }}" alt="Logo Preview" class="mt-2 rounded img-fluid">
                        
              </a>
              <p>{{ $settings['site_address'] ?? 'This tool simplifies your spending and saving to organize your money.' }}</p>
              <div class="lonyo-social-wrap">
                <ul>
                  <li>
                    <a href="{{ $settings['site_facebook'] ?? '' }}">
                      Fb
                    </a>
                  </li>
                  <li>
                    <a href="{{ $settings['site_twitter'] ?? '' }}">
                      Tw
                    </a>
                  </li>
                  <li>
                    <a href="{{ $settings['site_instagram'] ?? '' }}">
                      Ins
                    </a>
                  </li>
                  <li>
                    <a href="{{ $settings['site_linkedin'] ?? '' }}">
                      Ld
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-xxl-3 col-xl-4 col-md-6">
            <div class="lonyo-footer-menu">
              <h4>Main pages</h4>
              <div class="lonyo-footer-menu-wrap">
                <div class="lonyo-footer-menu1">
                  <ul>
                    <li>
                      <a href="index.html">Home 01</a>
                    </li>
                    <li>
                      <a href="index-02.html">Home 02</a>
                    </li>
                    <li>
                      <a href="index-03.html">Home 03</a>
                    </li>
                    <li>
                      <a href="about-us.html">About us</a>
                    </li>
                    <li>
                      <a href="contact-us.html">Contact us</a>
                    </li>
                  </ul>
                </div>
                <div class="lonyo-footer-menu1">
                  <ul>
                    <li>
                      <a href="blog.html">Blog</a>
                    </li>
                    <li>
                      <a href="single-blog.html">Blog single</a>
                    </li>
                    <li>
                      <a href="integration.html">Integrations</a>
                    </li>
                    <li>
                      <a href="single-integration.html">Integration single</a>
                    </li>
                    <li>
                      <a href="pricing.html">Pricing</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xxl-2 col-xl-4 col-md-6">
            <div class="lonyo-footer-menu pl-30">
              <h4>Utility pages</h4>
              <ul>
                <li>
                  <a href="sign-up.html">Sign up</a>
                </li>
                <li>
                  <a href="login.html">Log in</a>
                </li>
                <li>
                  <a href="reset-password.html">Reset password</a>
                </li>
                <li>
                  <a href="cooming-soon.html">Coming soon</a>
                </li>
                <li>
                  <a href="error-404.html">404 Not found</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-xxl-3 col-xl-4 col-md-6">
            <div class="mb-0 lonyo-footer-menu pl-31">
              <h4>Join our newsletter</h4>
              <div class="lonyo-subscription-field2">
                <form action="#">
                  <input type="email" placeholder="Enter your e-mail">
                  <button class="lonyo-default-btn subscrib-btn d-block" type="submit">Subscribe</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="lonyo-footer-shape"></div>
      </div>
      <div class="lonyo-footer-bottom-text">
        <p>{{ $settings['site_copyright'] ?? '© Copyright All Rights Reserved' }}
          {{-- <span id="current-year"></span> --}}
        </p>
      </div>
    </div>
  </footer>

  <!-- scripts -->

  <script src="{{ asset('frontend') }}/assets/js/jquery-3.7.1.min.js"></script>
  <script src="{{ asset('frontend') }}/assets/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('frontend') }}/assets/js/menu/menu.js"></script>
  <script src="{{ asset('frontend') }}/assets/js/jquery.magnific-popup.min.js"></script>
  <script src="{{ asset('frontend') }}/assets/js/slick.js"></script>
  <script src="{{ asset('frontend') }}/assets/js/pricing.min.js"></script>
  <script src="{{ asset('frontend') }}/assets/js/countdown.js"></script>
  <script src="{{ asset('frontend') }}/assets/js/skillbar.js"></script>
  <script src="{{ asset('frontend') }}/assets/js/slick-animation.js"></script>
  <script src="{{ asset('frontend') }}/assets/js/slick-animation.min.js"></script>
  <script src="{{ asset('frontend') }}/assets/js/faq.js"></script>
  <script src="{{ asset('frontend') }}/assets/js/isotope.pkgd.min.js"></script>
  <script src="{{ asset('frontend') }}/assets/js/tabs-slider.js"></script>
  <script src="{{ asset('frontend') }}/assets/js/product-increment.js"></script>
  <script src="{{ asset('frontend') }}/assets/js/aos.js"></script>
  <script src="{{ asset('frontend') }}/assets/js/niceselect.js"></script>
  <script src="{{ asset('frontend') }}/assets/js/wow.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyArZVfNvjnLNwJZlLJKuOiWHZ6vtQzzb1Y"></script>
  <script src="{{ asset('frontend') }}/assets/js/slick.js"></script>

  <script src="{{ asset('frontend') }}/assets/js/app.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Axios CDN -->
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

  <script src="{{ asset('frontend') }}/custom.js"></script>


