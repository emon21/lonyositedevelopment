@extends('frontend/layouts/frontend-master', ['title' => 'Single Blog'])

@section('frontend')

    <x-breadcrumb title="Single Blog" current="Blog" />

    <!-- End breadcrumb -->
    <div class="overflow-hidden lonyo-section-padding7">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="lonyo-blog-d-wrap">
                        <div class="lonyo-blog-d-thumb" data-aos="fade-up" data-aos-duration="700">
                            <img src="{{ $blog->photo ? asset('uploads/blog/' . $blog->photo) : asset('uploads/no_image.jpg') }}"
                                alt="Blog Image" style="width: 100%; height: 500px;">
                        </div>
                        <div class="pb-0 lonyo-blog-meta">
                            <ul>
                                <li><img src="{{ asset('frontend') }}/assets/images/blog/date.svg"
                                        alt="">{{ Carbon\Carbon::parse($blog->created_at)->format('F d, Y') }}
                                </li>
                                <li>
                                    <a href="single-blog.html"><img
                                            src="{{ asset('frontend') }}/assets/images/blog/clock.svg" alt="">5 min read</a>
                                </li>
                            </ul>
                        </div>

                        <div class="lonyo-blog-d-content">
                            <h2>{{ strtoupper($blog->title) }}:</h2>
                            <p>{!! $blog->description !!}</p>
                        </div>


                        <div class="lonyo-blog-d-content-wrap">
                            <div class="lonyo-blog-widgets widgets2">
                                <h4>Tags</h4>
                                <div class="lonyo-blog-tags">
                                    <ul>
                                        <li><a href="blog.html">Software</a></li>
                                        <li><a href="blog.html">Business</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tag-share-social">
                                <h4>Share:</h4>
                                <ul>
                                    <li>
                                        <a href="https://www.facebook.com">
                                            <svg width="8" height="16" viewBox="0 0 9 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M2.26296 8.50593H0.396489C0.0949817 8.50593 0 8.39549 0 8.10944V5.82991C0 5.52841 0.110444 5.43342 0.396489 5.43342H2.26407V3.77679C2.24163 3.03369 2.41736 2.298 2.77321 1.64525C3.14708 0.993513 3.74293 0.498015 4.45193 0.249264C4.9178 0.082563 5.40947 -0.000442427 5.90424 0.00408169H7.75305C8.017 0.00408169 8.13076 0.114524 8.13076 0.381794V2.53211C8.13076 2.79606 8.02032 2.90982 7.75305 2.90982C7.24391 2.90982 6.73477 2.90982 6.22563 2.92859C6.12054 2.91318 6.0133 2.92255 5.91247 2.95595C5.81164 2.98935 5.72002 3.04586 5.64491 3.12097C5.5698 3.19607 5.5133 3.2877 5.47989 3.38853C5.44649 3.48936 5.43713 3.5966 5.45254 3.70169C5.43376 4.26715 5.45254 4.81495 5.45254 5.39919H7.6404C7.94191 5.39919 8.05566 5.50963 8.05566 5.81445V8.09619C8.05566 8.3977 7.96179 8.49268 7.6404 8.49268H5.45033V14.641C5.45033 14.9613 5.35645 15.075 5.01629 15.075H2.65945C2.37672 15.075 2.26296 14.9646 2.26296 14.6786V8.50593Z"
                                                    fill="#222627"></path>
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.instagram.com">
                                            <svg width="15" height="15" viewBox="0 0 16 15" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.982 0.00101299H4.28531C3.78547 -0.0105907 3.28834 0.0775941 2.82299 0.260409C2.35763 0.443224 1.93341 0.716999 1.57513 1.06572C1.21684 1.41444 0.931692 1.8311 0.736356 2.29134C0.541021 2.75157 0.439421 3.24614 0.4375 3.74611L0.4375 11.2363C0.439421 11.7363 0.541021 12.2308 0.736356 12.6911C0.931692 13.1513 1.21684 13.568 1.57513 13.9167C1.93341 14.2654 2.35763 14.5392 2.82299 14.722C3.28834 14.9048 3.78547 14.993 4.28531 14.9814H11.982C12.4819 14.993 12.979 14.9048 13.4444 14.722C13.9097 14.5392 14.3339 14.2654 14.6922 13.9167C15.0505 13.568 15.3357 13.1513 15.531 12.6911C15.7263 12.2308 15.8279 11.7363 15.8298 11.2363V3.74611C15.8279 3.24614 15.7263 2.75157 15.531 2.29134C15.3357 1.8311 15.0505 1.41444 14.6922 1.06572C14.3339 0.716999 13.9097 0.443224 13.4444 0.260409C12.979 0.0775941 12.4819 -0.0105907 11.982 0.00101299ZM14.2914 11.2363C14.2929 11.5371 14.2337 11.8352 14.1174 12.1126C14.0011 12.39 13.83 12.6411 13.6144 12.8509C13.3988 13.0607 13.1432 13.2249 12.8627 13.3337C12.5822 13.4424 12.2827 13.4935 11.982 13.4838H4.28531C3.98465 13.4935 3.68512 13.4424 3.40464 13.3337C3.12417 13.2249 2.8685 13.0607 2.65292 12.8509C2.43734 12.6411 2.26628 12.39 2.14997 12.1126C2.03365 11.8352 1.97447 11.5371 1.97596 11.2363V3.74611C1.97447 3.4453 2.03365 3.14727 2.14997 2.86985C2.26628 2.59242 2.43734 2.3413 2.65292 2.1315C2.8685 1.92169 3.12417 1.75751 3.40464 1.64877C3.68512 1.54003 3.98465 1.48896 4.28531 1.49861H11.982C12.2827 1.48896 12.5822 1.54003 12.8627 1.64877C13.1432 1.75751 13.3988 1.92169 13.6144 2.1315C13.83 2.3413 14.0011 2.59242 14.1174 2.86985C14.2337 3.14727 14.2929 3.4453 14.2914 3.74611V11.2363Z"
                                                    fill="#121213"></path>
                                                <path
                                                    d="M8.13297 3.64373C7.37194 3.64373 6.62801 3.8694 5.99524 4.2922C5.36247 4.71501 4.86929 5.31595 4.57805 6.01905C4.28682 6.72214 4.21062 7.49581 4.35909 8.24221C4.50756 8.98861 4.87403 9.67423 5.41216 10.2124C5.95028 10.7505 6.6359 11.1169 7.3823 11.2654C8.1287 11.4139 8.90237 11.3377 9.60546 11.0465C10.3086 10.7552 10.9095 10.262 11.3323 9.62927C11.7551 8.9965 11.9808 8.25257 11.9808 7.49154C11.9856 6.98488 11.8894 6.48234 11.6978 6.01331C11.5062 5.54427 11.2229 5.11815 10.8646 4.75988C10.5064 4.4016 10.0802 4.11836 9.6112 3.92671C9.14216 3.73506 8.63962 3.63886 8.13297 3.64373ZM8.13297 9.80089C7.67622 9.80089 7.22973 9.66545 6.84996 9.41169C6.47019 9.15794 6.1742 8.79727 5.99941 8.37529C5.82462 7.95331 5.77889 7.48898 5.86799 7.04101C5.9571 6.59304 6.17704 6.18155 6.50001 5.85858C6.82298 5.53562 7.23447 5.31567 7.68244 5.22657C8.13041 5.13746 8.59474 5.18319 9.01672 5.35798C9.4387 5.53277 9.79937 5.82876 10.0531 6.20854C10.3069 6.58831 10.4423 7.03479 10.4423 7.49154C10.448 7.79638 10.3922 8.09923 10.2781 8.38198C10.1641 8.66474 9.9942 8.9216 9.77861 9.13718C9.56302 9.35277 9.30617 9.52267 9.02341 9.63671C8.74065 9.75074 8.4378 9.80659 8.13297 9.80089Z"
                                                    fill="#121213"></path>
                                                <path
                                                    d="M11.8454 4.66842C12.3706 4.66842 12.7963 4.24268 12.7963 3.71751C12.7963 3.19234 12.3706 2.7666 11.8454 2.7666C11.3203 2.7666 10.8945 3.19234 10.8945 3.71751C10.8945 4.24268 11.3203 4.66842 11.8454 4.66842Z"
                                                    fill="#222627"></path>
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.twitter.com">
                                            <svg width="18" height="18" viewBox="0 0 17 15" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M16.3682 2.43269C16.321 2.35584 16.2533 2.29365 16.1728 2.25308C16.0922 2.21251 16.002 2.19516 15.9121 2.20297L15.0993 2.27366L15.8724 0.706481C15.9177 0.615492 15.9333 0.512585 15.9171 0.412242C15.9008 0.311899 15.8535 0.21917 15.7819 0.147111C15.7102 0.0750528 15.6177 0.0272907 15.5174 0.0105456C15.4172 -0.00619945 15.3142 0.00891781 15.223 0.0537672L13.1654 1.061C12.5325 0.732103 11.8136 0.605916 11.1065 0.699567C10.3994 0.793219 9.73819 1.10217 9.21268 1.5845C8.75801 2.01587 8.40544 2.54336 8.18073 3.12844C7.95602 3.71352 7.86485 4.34141 7.91388 4.96624C6.73758 4.84885 5.60936 4.4389 4.63209 3.77375C3.65482 3.10861 2.85958 2.20943 2.31887 1.15819C2.27994 1.08622 2.22348 1.02525 2.1547 0.980922C2.08593 0.936597 2.00708 0.910352 1.92546 0.904624C1.84384 0.898897 1.7621 0.913871 1.68781 0.948158C1.61352 0.982444 1.54909 1.03493 1.50049 1.10076C1.14417 1.60692 0.935627 2.20221 0.89818 2.82009C0.860733 3.43796 0.995855 4.05408 1.28844 4.59957C1.1283 4.55871 0.957117 4.50459 0.769365 4.44164C0.689897 4.41499 0.604887 4.40935 0.522594 4.42526C0.440301 4.44117 0.363523 4.4781 0.299719 4.53246C0.235915 4.58681 0.187256 4.65675 0.158468 4.73547C0.12968 4.81418 0.121742 4.89901 0.135426 4.9817C0.236779 5.64852 0.501612 6.27989 0.9063 6.81947C1.31099 7.35905 1.84295 7.79008 2.45472 8.07409C2.28787 8.13219 2.11743 8.17941 1.94447 8.21545C1.85985 8.2329 1.78142 8.2726 1.71725 8.33045C1.65308 8.3883 1.60549 8.46221 1.57939 8.54457C1.55328 8.62693 1.54961 8.71475 1.56874 8.799C1.58788 8.88326 1.62913 8.96088 1.68825 9.02389C2.57515 9.88095 3.68487 10.4718 4.89107 10.7291C3.74596 11.5247 2.34147 11.8559 0.961535 11.6557C0.865938 11.6523 0.77146 11.6772 0.68994 11.7272C0.60842 11.7773 0.543484 11.8503 0.503271 11.9371C0.463058 12.0239 0.449355 12.1206 0.463881 12.2152C0.478406 12.3097 0.520514 12.3979 0.584927 12.4686C1.28955 13.2417 3.85512 14.1252 6.54881 14.186C6.65557 14.186 6.76602 14.186 6.88014 14.186C9.15409 14.2959 11.3796 13.5046 13.0737 11.9837C14.376 10.7305 15.259 9.10534 15.6018 7.33081C15.7798 6.32263 15.7854 5.29155 15.6183 4.2815C15.6128 4.24174 15.6062 4.19977 15.6018 4.16333L16.3627 2.93742C16.4098 2.86186 16.4352 2.77483 16.4361 2.68583C16.4371 2.59682 16.4136 2.50926 16.3682 2.43269Z"
                                                    fill="#222627"></path>
                                            </svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.bd.linkedin.com">
                                            <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M3.55536 1.77857C3.55512 2.25004 3.36761 2.7021 3.03406 3.03532C2.70051 3.36853 2.24826 3.55559 1.77679 3.55536C1.30532 3.55512 0.853254 3.36761 0.520042 3.03406C0.186829 2.70051 -0.000235512 2.24826 2.22531e-07 1.77679C0.000235957 1.30532 0.187753 0.853255 0.521299 0.520042C0.854845 0.186829 1.3071 -0.000235512 1.77857 2.22531e-07C2.25004 0.000235957 2.7021 0.187753 3.03532 0.521299C3.36853 0.854845 3.55559 1.3071 3.55536 1.77857ZM3.60869 4.87173H0.0533305V16H3.60869V4.87173ZM9.22615 4.87173H5.68857V16H9.1906V10.1603C9.1906 6.90717 13.4304 6.60497 13.4304 10.1603V16H16.9413V8.9515C16.9413 3.46736 10.6661 3.6718 9.1906 6.36498L9.22615 4.87173Z"
                                                    fill="#142D6F" />
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="lonyo-blog-d-comment-box">
                            <h4>Comments:</h4>
                            <div class="lonyo-blog-d-comment-wrap1">
                                <div class="lonyo-blog-d-comment-thumb">
                                    <img src="{{ asset('frontend') }}/assets/images/blog/b8.png" alt="">
                                </div>
                                <div class="lonyo-blog-d-comment-data1">
                                    <h5>Vicky Smith</h5>
                                    <span>June 21, 2025</span>
                                    <p>After reading the blog, I understand personal finance is exigent. Personal finance
                                        isn't just a way to track your spending.</p>
                                </div>
                                <div class="reply-btn">
                                    <a href="single-blog.html">Reply</a>
                                </div>
                            </div>
                            <div class="lonyo-blog-d-comment-wrap pl-101">
                                <div class="lonyo-blog-d-comment-thumb">
                                    <img src="{{ asset('frontend') }}/assets/images/blog/b9.png" alt="">
                                </div>
                                <div class="lonyo-blog-d-comment-data">
                                    <h5>Adam Mac</h5>
                                    <span>September 22, 2025</span>
                                    <p>It's a tool to secure financial future, helping consumers track spending, pay bills,
                                        budgets and create savings.</p>
                                </div>
                                <div class="reply-btn">
                                    <a href="single-blog.html">Reply</a>
                                </div>
                            </div>
                            <div class="lonyo-blog-d-comment-wrap1 wrap2">
                                <div class="lonyo-blog-d-comment-thumb">
                                    <img src="{{ asset('frontend') }}/assets/images/blog/b10.png" alt="">
                                </div>
                                <div class="lonyo-blog-d-comment-data1">
                                    <h5>William Thomas</h5>
                                    <span>June 21, 2025</span>
                                    <p>Yes exactly! Personal finance software gives a clear picture of your situation by
                                        effortlessly organizing & tracking expenses.</p>
                                </div>
                                <div class="reply-btn">
                                    <a href="single-blog.html">Reply</a>
                                </div>
                            </div>
                        </div>
                        <div class="lonyo-blog-d-comment-box2" data-aos="fade-up" data-aos-duration="700">
                            <h4>Leave a comments:</h4>
                            <div class="lonyo-contact-box">
                                <form action="#">
                                    <div class="lonyo-main-field">
                                        <p>Full name*</p>
                                        <input type="text" placeholder="Enter your name">
                                    </div>
                                    <div class="lonyo-main-field">
                                        <p>Email address*</p>
                                        <input type="email" placeholder="Your email address">
                                    </div>
                                    <p>Message</p>
                                    <div class="lonyo-main-field-textarea">
                                        <textarea class="button-text" name="textarea"
                                            placeholder="Write your message here..."></textarea>
                                    </div>
                                    <button class="lonyo-default-btn extra-btn d-block" type="button">Submit A
                                        Comment</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- blog sidebar -->
                @include('frontend/components/blog')
                <!-- blog sidebar -->

            </div>
            <div class="deivdead-line"></div>
            <div class="lonyo-section-title center max-width-700">
                <h2>Check out the related articles and news</h2>
            </div>

            {{-- @php
            $category = $relatedBlogs[0]; // প্রথম category
            $blogs = $category['blog'];
            $firstBlog = $blogs[0] ?? null;
            $relatedBlogs = array_slice($blogs, 1); // প্রথম বাদ বাকি সব
            @endphp --}}

            @if(count($relatedBlogs))
    @foreach($relatedBlogs as $blog)
        <div class="mb-3 card">
            <img src="{{ asset('uploads/' . $blog['photo']) }}" class="card-img-top" alt="{{ $blog['title'] }}">
            <div class="card-body">
                <h5>{{ $blog['title'] }}</h5>
                <p>{{ Str::limit($blog['description'], 100) }}</p>
                <a href="{{ url('/blog/' . $blog['slug']) }}" class="btn btn-sm btn-primary">Read More</a>
            </div>
        </div>
    @endforeach
@else
    <p>No related blogs found.</p>
@endif

            <!-- Related Blogs -->
            <div class="row">
                @forelse($relatedBlogs as $blog)
                    <div class="col-lg-6">
                        <div class="lonyo-blog-wrap" data-aos="fade-up" data-aos-duration="700">
                            <div class="lonyo-blog-thumb">
                                {{-- <img src="{{ $blog->photo ? asset('uploads/blog/' . $blog->photo) : asset('uploads/no_image.jpg') }}"
                                    alt="Blog Image" style="width: 576px; height: 350px;"> --}}
                            </div>
                            <div class="lonyo-blog-meta">
                                <ul>
                                    <li>
                                        <a href="blog.html"><img src="{{ asset('frontend') }}/assets/images/blog/date.svg"
                                                alt="">June 10, 2025</a>
                                    </li>
                                    <li>
                                        <a href="blog.html"><img src="{{ asset('frontend') }}/assets/images/blog/clock.svg"
                                                alt="">7 min read</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="lonyo-blog-content">
                                <a href="blog.html">
                                    <h2>{{ $blog['title'] }}</h2>
                                </a>
                                {{-- <p>{{ $blog->description }}</p> --}}
                            </div>
                            <div class="lonyo-blog-btn">
                                <a href="blog.html" class="lonyo-default-btn blog-btn">Continue Reading</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>No blog found</p>
                @endforelse
            </div>

        </div>
    </div>
    <!-- end blog -->


@endsection