@extends('frontend/layouts/frontend-master', ['title' => 'Single Category'])

@section('frontend')

   <x-breadcrumb title="Single Category" current="Category" />

   <!-- End breadcrumb -->

   <div class="overflow-hidden lonyo-section-padding3 mt-4">
      <div class="container">
         <div class="mb-4">
            <h2>{{ $category->category_name ?? 'No Category' }} of Total Blog ( {{ $category->blog_count }} )</h2>
            <p class="py-3">Total Post : {{ $category->blog_count }}</p>
         </div>
         <div class="row">
            <div class="col-lg-8">
               @if($posts->count() > 0)
                  <div class="row">
                     @foreach($posts as $blog)
                        <div class="mb-3 col-sm-6">
                           <div class="card">
                              <img src="{{ asset('uploads/blog/' . $blog->photo) }}" class="card-img-top" height="250">
                              <div class="card-body">
                                 <h5>{{ $blog->title }}</h5>
                                 <p>{{ Str::limit($blog->description, 50) }}</p>
                                 <a href="{{ Route('single-blog', $blog) }}" class="btn btn-primary btn-sm">
                                    Read More
                                 </a>
                              </div>
                           </div>
                        </div>
                     @endforeach
                  </div>
               @else
                  <p class="text-danger">Sorry !! No Blogs found in this Category.</p>
               @endif
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