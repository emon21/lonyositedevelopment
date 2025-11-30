@php

$title = App\Models\SiteTitle::latest()->first();

@endphp

<div class="lonyo-content-shape1">
    <img src="{{ asset('frontend') }}/assets/images/shape/shape1.svg" alt="">
  </div>
  <div class="lonyo-section-padding2 position-relative">
    <div class="container">
      <div class="lonyo-section-title center">
        <h2 id="feature_title" class="p-4 rounded" contenteditable="{{ auth()->check() ? 'true' : 'false' }}" data-id="{{ $title->id }}">{{ $title->features }}</h2>
      </div>
      <div class="row">
        <div class="col-xl-4 col-lg-6 col-md-6">
          <div class="lonyo-service-wrap light-bg" data-aos="fade-up" data-aos-duration="500">
            <div class="lonyo-service-title">
              <h4>Expense Tracking</h4>
              <img src="{{ asset('frontend') }}/assets/images/v1/feature1.svg" alt="">
            </div>
            <div class="lonyo-service-data">
              <p>Allows users to record and categorize daily transactions such as income, expenses, bills, and savings.</p>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6">
          <div class="lonyo-service-wrap light-bg" data-aos="fade-up" data-aos-duration="700">
            <div class="lonyo-service-title">
              <h4>Budgeting Tools</h4>
              <img src="{{ asset('frontend') }}/assets/images/v1/feature2.svg" alt="">
            </div>
            <div class="lonyo-service-data">
              <p>Provides visual insights like graphs or pie charts to show how much is spent versus the budgeted amount.</p>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6">
          <div class="lonyo-service-wrap light-bg" data-aos="fade-up" data-aos-duration="900">
            <div class="lonyo-service-title">
              <h4>Investment Tracking</h4>
              <img src="{{ asset('frontend') }}/assets/images/v1/feature3.svg" alt="">
            </div>
            <div class="lonyo-service-data">
              <p>For users interested in investing, finance apps often provide tools to track stocks, bonds or mutual funds.</p>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6">
          <div class="lonyo-service-wrap light-bg" data-aos="fade-up" data-aos-duration="500">
            <div class="lonyo-service-title">
              <h4>Tax Management</h4>
              <img src="{{ asset('frontend') }}/assets/images/v1/feature4.svg" alt="">
            </div>
            <div class="lonyo-service-data">
              <p>This tool integrate with tax software to help users prepare for tax season, deduct expenses, and file returns.</p>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6">
          <div class="lonyo-service-wrap light-bg" data-aos="fade-up" data-aos-duration="700">
            <div class="lonyo-service-title">
              <h4>Bill Management</h4>
              <img src="{{ asset('frontend') }}/assets/images/v1/feature5.svg" alt="">
            </div>
            <div class="lonyo-service-data">
              <p>Tracks upcoming bills, sets reminders for due dates, and enables easy payments via integration with online banking</p>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6">
          <div class="lonyo-service-wrap light-bg" data-aos="fade-up" data-aos-duration="900">
            <div class="lonyo-service-title">
              <h4>Security Features</h4>
              <img src="{{ asset('frontend') }}/assets/images/v1/feature6.svg" alt="">
            </div>
            <div class="lonyo-service-data">
              <p>Provides bank-level encryption to ensure user data and financial information remain safe, MFA and biometric logins.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="lonyo-feature-shape"></div>
  </div>

  @push('frontend-js')
      <script>
        document.addEventListener("DOMContentLoaded", function () {
        const title = document.getElementById("feature_title");


        /**
         * ============================================
         *  SAVE CHANGES FUNCTION (Axios + Vanilla JS)
         * ============================================
         */
        // Save Function
        function saveChanges(element) {

          let titleId = element.dataset.id;
          let field = element.id === "feature_title" ? "features" : "";
          let newValue = element.innerText.trim();

          // axios api
          axios.post(`/admin/edit-siteTitle/${titleId}`, {
            [field]: newValue
          })
            .then(function (response) {
              if (response.data.message) {
                console.log(field + " " + response.data.message);
                // SUCCESS MESSAGE Features  Changes saved successfully!
                toastr.success("Feature Title Updated Successfully!");

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