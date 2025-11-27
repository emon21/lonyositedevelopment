@extends('frontend/layouts/frontend-master', ['title' => 'Blog'])

@section('frontend')

    <x-breadcrumb title="Blog" current="Blog" />

    <!-- End breadcrumb -->

      <div class="overflow-hidden lonyo-section-padding9">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="lonyo-blog-wrap" data-aos="fade-up" data-aos-duration="500">
            <div class="lonyo-blog-thumb">
              <img src="{{ asset ('frontend') }}/assets/images/blog/b1.png" alt="">
            </div>
            <div class="lonyo-blog-meta">
              <ul>
                <li>
                  <a href="single-blog.html"><img src="{{ asset ('frontend') }}/assets/images/blog/date.svg" alt="">June 15, 2025</a>
                </li>
                <li>
                  <a href="single-blog.html"><img src="{{ asset ('frontend') }}/assets/images/blog/clock.svg" alt="">5 min read</a>
                </li>
              </ul>
            </div>
            <div class="lonyo-blog-content">
              <h2><a href="single-blog.html">A guide to free personal finance software</a></h2>
              <p>Imagine having a tool that meticulously tracks all income and expenses savings all in one place — sounds like a...</p>
            </div>
            <div class="lonyo-blog-btn">
              <a href="single-blog.html" class="lonyo-default-btn blog-btn">continue reading</a>
            </div>
          </div>
          <div class="lonyo-blog-wrap" data-aos="fade-up" data-aos-duration="700">
            <div class="lonyo-blog-thumb">
              <img src="{{ asset ('frontend') }}/assets/images/blog/b2.png" alt="">
            </div>
            <div class="lonyo-blog-meta">
              <ul>
                <li>
                  <a href="single-blog.html"><img src="{{ asset ('frontend') }}/assets/images/blog/date.svg" alt="">June 10, 2025</a>
                </li>
                <li>
                  <a href="single-blog.html"><img src="{{ asset ('frontend') }}/assets/images/blog/clock.svg" alt="">7 min read</a>
                </li>
              </ul>
            </div>
            <div class="lonyo-blog-content">
              <h2><a href="single-blog.html">AI-powered tools for increasing productivity</a></h2>
              <p>Artificial Intelligence (AI) has revolutionized many industries, and the field of finance and financial planning and analysis...</p>
            </div>
            <div class="lonyo-blog-btn">
              <a href="single-blog.html" class="lonyo-default-btn blog-btn">continue reading</a>
            </div>
          </div>
          <div class="mb-0 lonyo-blog-wrap" data-aos="fade-up" data-aos-duration="900">
            <div class="lonyo-blog-thumb">
              <img src="{{ asset ('frontend') }}/assets/images/blog/b3.png" alt="">
            </div>
            <div class="lonyo-blog-meta">
              <ul>
                <li>
                  <a href="single-blog.html"><img src="{{ asset ('frontend') }}/assets/images/blog/date.svg" alt="">June 05, 2025</a>
                </li>
                <li>
                  <a href="single-blog.html"><img src="{{ asset ('frontend') }}/assets/images/blog/clock.svg" alt="">10 min read</a>
                </li>
              </ul>
            </div>
            <div class="lonyo-blog-content">
              <h2><a href="single-blog.html">Using finance software to boost your income</a></h2>
              <p>Are you aware of the fact that what is the most significant stress cause in the United States of America? If your...</p>
            </div>
            <div class="lonyo-blog-btn">
              <a href="single-blog.html" class="lonyo-default-btn blog-btn">continue reading</a>
            </div>
          </div>
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
        <div class="col-lg-4">
          <div class="lonyo-blog-sidebar" data-aos="fade-left" data-aos-duration="700">
            <div class="lonyo-blog-widgets">
              <form action="#">
                <div class="lonyo-search-box">
                  <input type="search" placeholder="Type keyword here">
                  <button id="lonyo-search-btn" type="button"><i class="ri-search-line"></i></button>
                </div>
              </form>
            </div>
            <div class="lonyo-blog-widgets">
              <h4>Categories:</h4>
              <div class="lonyo-blog-categorie">
                <ul>
                  <li><a href="single-blog.html">Finance <span>10</span></a></li>
                  <li><a href="single-blog.html">Business <span>18</span></a></li>
                  <li><a href="single-blog.html">Technology <span>03</span></a></li>
                  <li><a href="single-blog.html">Development <span>07</span></a></li>
                  <li><a href="single-blog.html">Uncategorized <span>49</span></a></li>
                </ul>
              </div>
            </div>
            <div class="lonyo-blog-widgets">
              <h4>Recent Posts</h4>
              <a class="lonyo-blog-recent-post-item" href="single-blog.html">
                <div class="lonyo-blog-recent-post-thumb">
                  <img src="{{ asset ('frontend') }}/assets/images/blog/b4.png" alt="">
                </div>
                <div class="lonyo-blog-recent-post-data">
                  <ul>
                    <li><img src="{{ asset ('frontend') }}/assets/images/blog/date.svg" alt="">June 15, 2025</li>
                  </ul>
                  <div>
                    <h4>7 businesses for easy money</h4>
                  </div>
                </div>
              </a>
              <a class="lonyo-blog-recent-post-item" href="single-blog.html">
                <div class="lonyo-blog-recent-post-thumb">
                  <img src="{{ asset ('frontend') }}/assets/images/blog/b5.png" alt="">
                </div>
                <div class="lonyo-blog-recent-post-data">
                  <ul>
                    <li><img src="{{ asset ('frontend') }}/assets/images/blog/date.svg" alt="">June 12, 2025</li>
                  </ul>
                  <div>
                    <h4>10 Finance apps for you to use</h4>
                  </div>
                </div>
              </a>
              <a class="lonyo-blog-recent-post-item" href="single-blog.html">
                <div class="lonyo-blog-recent-post-thumb">
                  <img src="{{ asset ('frontend') }}/assets/images/blog/b6.png" alt="">
                </div>
                <div class="lonyo-blog-recent-post-data">
                  <ul>
                    <li><img src="{{ asset ('frontend') }}/assets/images/blog/date.svg" alt="">June 08, 2025</li>
                  </ul>
                  <div>
                    <h4>How to create a stock market</h4>
                  </div>
                </div>
              </a>
            </div>
            <div class="lonyo-blog-widgets">
              <h4>Tags</h4>
              <div class="lonyo-blog-tags">
                <ul>
                  <li><a href="single-blog.html">Software</a></li>
                  <li><a href="single-blog.html">Business</a></li>
                  <li><a href="single-blog.html">App</a></li>
                  <li><a href="single-blog.html">Solutions</a></li>
                  <li><a href="single-blog.html">Finance</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end blog -->
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