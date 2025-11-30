@php

$title = App\Models\SiteTitle::latest()->first();

@endphp
<div class="overflow-hidden lonyo-section-padding position-relative">
  <div class="container">
    <div class="lonyo-section-title">
      <div class="row">
        <div class="col-xl-8 col-lg-8">
          <h2 id="reviews_title" class="p-4 rounded" contenteditable="{{ auth()->check() ? 'true' : 'false' }}"
            data-id="{{ $title->id }}">{{ $title->reviews }}</h2>
        </div>
        <div class="col-xl-4 col-lg-4 d-flex align-items-center justify-content-end">
          <div class="lonyo-title-btn">
            <a class="lonyo-default-btn t-btn" href="contact-us.html">Read Customer Stories</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="lonyo-testimonial-slider-init">
    @php

$reviews = App\models\Review::latest()->get();

    @endphp

    @foreach($reviews as $review)
      <div class="lonyo-t-wrap wrap2 light-bg">
        <div class="lonyo-t-ratting">
          <img src="{{ asset('frontend') }}/assets/images/shape/star.svg" alt="">
        </div>
        <div class="lonyo-t-text">
          <p>{{ $review->message }}</p>
        </div>
        <div class="lonyo-t-author">
          <div class="lonyo-t-author-thumb">
            {{-- <img src="{{ asset('frontend') }}/assets/images/v1/img7.png" alt=""> --}}
            <img
                src="{{ $review->photo ? asset('uploads/review/' . $review->photo) : asset('uploads/no_image.jpg') }}"
                alt="Review Image" style="width: 80px; height: 50px;">

          </div>
          <div class="lonyo-t-author-data">
            <p>{{ $review->name }}</p>
            <span>{{ $review->position }}</span>
          </div>
        </div>
      </div>
    @endforeach

  </div>
  <div class="lonyo-t-overlay2">
    <img src="{{ asset('frontend') }}/assets/images/v2/overlay.png" alt="">
  </div>
</div>

@push('frontend-js')
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const title = document.getElementById("reviews_title");


      /**
       * ============================================
       *  SAVE CHANGES FUNCTION (Axios + Vanilla JS)
       * ============================================
       */
      // Save Function
      function saveChanges(element) {

        let titleId = element.dataset.id;
        let field = element.id === "reviews_title" ? "reviews" : "";
        let newValue = element.innerText.trim();

        // axios api
        axios.post(`/admin/edit-siteTitle/${titleId}`, {
          [field]: newValue
        })
          .then(function (response) {
            if (response.data.message) {
              // console.log(field + " " + response.data.message);
              // SUCCESS MESSAGE
              toastr.success("Reviews Title Updated Successfully!");

            } else {
              console.error("Update failed:", response.data.message);
            }

            // console.log(`${field} updated successfully`);
          })
          .catch(function (error) {
            console.error("Failed to update:", error);
            // ERROR MESSAGE
            toastr.error("Something went wrong!");
          });
      }

      /**
       * ============================================
       *  AUTO SAVE ON PRESSING ENTER
       * ============================================
       */

      // auto save on Enter key
      // Auto Save When Press Enter
      document.addEventListener("keydown", function (e) {
        if (e.key === "Enter") {
          e.preventDefault();
          saveChanges(e.target);
        }

      });


      /**
       * ============================================
       *  AUTO SAVE WHEN LOSING FOCUS (blur)
       * ============================================
       */

      // Auto Save On Losing Focus
      title.addEventListener("blur", function () {
        saveChanges(title);
      })

    });

  </script>

@endpush