<div class="breadcrumb-wrapper light-bg">
    <div class="container">

      <div class="breadcrumb-content">
        <h1 class="pb-0 breadcrumb-title">{{ $title ?? 'Page Title' }}</h1>
        <div class="breadcrumb-menu-wrapper">
          <div class="breadcrumb-menu-wrap">
            <div class="breadcrumb-menu">
              <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><img src="{{ asset('frontend') }}/assets/images/blog/right-arrow.svg" alt="right-arrow"></li>
                <li aria-current="page">{{ $current ?? $title ?? 'Current Page' }}</li>
              </ul>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>