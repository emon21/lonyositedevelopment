@extends('frontend/layouts/frontend-master', ['title' => 'Category'])

@section('frontend')

   <x-breadcrumb title="All Category" current="Category" />

   <!-- End breadcrumb -->

   <section class="lonyo-section-padding9">
      <div class="container">
         <div class="lonyo-section-title max-w616">
            <h2>All Category</h2>
         </div>
         <div class="row">
            @foreach($category as $item)
               <div class="col-xl-4 col-lg-6 col-md-6">
                  <div class="lonyo-service-wrap light-bg">
                     <div class="lonyo-service-title">
                        <a href="{{ route('category.posts', $item) }}">
                           {{ $item->category_name }} ( {{ $item->blog_count }} )
                        </a>
                     </div>
                  </div>
               </div>
            @endforeach
         </div>
      </div>
   </section>

   <div class="overflow-hidden lonyo-section-padding9">
      <div class="container">
         <div class="row">
            <div class="col-lg-8">
               <!-- blog sidebar -->
               @include('frontend/components/blog')
               <!-- blog sidebar -->
            </div>
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
                  <p>Our finance apps and software are powerful tools for managing personal or business finances, helping
                     users stay organized, track financial health, and make informed decisions.</p>
                  <div class="lonyo-cta-info mt-50" data-aos="fade-up" data-aos-duration="900">
                     <ul>
                        <li>
                           <a href="https://www.apple.com/app-store/"><img
                                 src="{{ asset('frontend') }}/assets/images/v1/app-store.svg" alt=""></a>
                        </li>
                        <li>
                           <a href="https://playstore.com/"><img
                                 src="{{ asset('frontend') }}/assets/images/v1/play-store.svg" alt=""></a>
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