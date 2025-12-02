@php

  $title = App\Models\SiteTitle::latest()->first();
  $usability = App\Models\Usability::latest()->first();

@endphp

<div class="lonyo-section-padding bg-heading position-relative sectionn">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="lonyo-video-thumb">
            <img src="{{ $usability->image ? asset('uploads/usability/' . $usability->image) : asset('uploads/no_image.jpg') }}" alt="">
            <a class="play-btn video-init" href="{{ $title->youtube }}">
              <img src="{{ asset('frontend') }}/assets/images/v1/play-icon.svg" alt="">
              <div class="waves wave-1"></div>
              <div class="waves wave-2"></div>
              <div class="waves wave-3"></div>
            </a>
          </div>
        </div>
        <div class="col-lg-7 d-flex align-items-center">
          <div class="lonyo-default-content lonyo-video-section pl-50" data-aos="fade-up" data-aos-duration="500">
            <h2 id="usability_title" class="p-4 rounded" contenteditable="{{ auth()->check() ? 'true' : 'false' }}"
              data-id="{{ $title->id }}">{{ $usability->title }}</h2>
            <p>{{ $usability->description }}</p>
            <div class="mt-50" data-aos="fade-up" data-aos-duration="700">
              <a class="lonyo-default-btn video-btn" href="{{ $usability->link }}l">Download the app</a>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-4 col-md-6">
          <div class="lonyo-process-wrap" data-aos="fade-up" data-aos-duration="500">
            <div class="lonyo-process-number">
              <img src="{{ asset('frontend') }}/assets/images/v1/n1.svg" alt="">
            </div>
            <div class="lonyo-process-title">
              <h4>Connect Your Accounts</h4>
            </div>
            <div class="lonyo-process-data">
              <p>Link your bank, credit card or investment accounts to automatically track transactions and get a complete financial overview</p>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-6">
          <div class="lonyo-process-wrap" data-aos="fade-up" data-aos-duration="700">
            <div class="lonyo-process-number">
              <img src="{{ asset('frontend') }}/assets/images/v1/n2.svg" alt="">
            </div>
            <div class="lonyo-process-title">
              <h4>Set Budgets & Goals</h4>
            </div>
            <div class="lonyo-process-data">
              <p>Define your spending limits and savings goals for categories like groceries, bills or future investments to stay on track.</p>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-6">
          <div class="lonyo-process-wrap" data-aos="fade-up" data-aos-duration="900">
            <div class="lonyo-process-number">
              <img src="{{ asset('frontend') }}/assets/images/v1/n3.svg" alt="">
            </div>
            <div class="lonyo-process-title">
              <h4>Monitor & Automate</h4>
            </div>
            <div class="lonyo-process-data">
              <p>Check your financial dashboard for regular updates and set up automatic payments or savings to simplify management.</p>
            </div>
          </div>
        </div>
        <div class="border-bottom" data-aos="fade-up" data-aos-duration="500"></div>
      </div>
    </div>
  </div>
  <div class="lonyo-content-shape1">
    <img src="{{ asset('frontend') }}/assets/images/shape/shape3.svg" alt="">
  </div>

  @push('frontend-js')
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        const title = document.getElementById("usability_title");


        /**
         * ============================================
         *  SAVE CHANGES FUNCTION (Axios + Vanilla JS)
         * ============================================
         */
        // Save Function
        function saveChanges(element) {

          let titleId = element.dataset.id;
          let field = element.id === "usability_title" ? "usability" : "";
          let newValue = element.innerText.trim();

          // axios api
          axios.post(`/admin/edit-siteTitle/${titleId}`, {
            [field]: newValue
          })
            .then(function (response) {
              if (response.data.message) {
                // console.log(field + " " + response.data.message);
                // SUCCESS MESSAGE
                toastr.success("Usability Title Updated Successfully!");

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