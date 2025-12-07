
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
               @php
                  $categories = App\Models\BlogCategory::withCount('blog')->get();
               @endphp
                <ul>
                   @foreach ($categories as $category)
                     <li><a href="{{ route('single-blog',$blog) }}">{{ $category->category_name }} <span>( {{ $category->blog_count }} )</span></a></li>
                  @endforeach
                </ul>
              </div>
            </div>
            <div class="lonyo-blog-widgets">
               @php
$blogs = App\Models\Blog::latest()->get();
               @endphp
              <h4>Recent Posts</h4>
              @foreach ($blogs as $blog)
                 <a class="lonyo-blog-recent-post-item" href="{{ route('single-blog',$blog) }}">
                   <div class="lonyo-blog-recent-post-thumb">
                     <img src="{{ $blog->photo ? asset('uploads/blog/' . $blog->photo) : asset('uploads/no_image.jpg') }}" alt="Review Image"
                        style="width: 150px; height: 120px;">
                   </div>
                   <div class="lonyo-blog-recent-post-data">
                     <ul>
                       <li><img src="{{ asset('frontend') }}/assets/images/blog/date.svg" alt="">June 15, 2025</li>
                     </ul>
                     <div>
                       <h4>{{ $blog->title }}</h4>
                     </div>
                   </div>
                 </a>
            @endforeach
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