@php

$title = App\Models\SiteTitle::latest()->first();

@endphp

<section class="lonyo-section-padding6">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="lonyo-content-thumb" data-aos="fade-up" data-aos-duration="700">
            <img src="{{ asset('frontend') }}/assets/images/v1/content-thumb.png" alt="">
          </div>
        </div>
        <div class="col-lg-7 d-flex align-items-center">
          <div class="lonyo-default-content pl-50" data-aos="fade-up" data-aos-duration="700">
            <h2 id="clarifies_title" class="p-4 rounded" contenteditable="{{ auth()->check() ? 'true' : 'false' }}" data-id="{{ $title->id }}">{{ $title->clarifies }}</h2>
            <p class="data">With this tool, you can say goodbye to overspending, stay on track with your savings goals, and say goodbye to financial worries. Get ready for a clearer view of your finances like never before!</p>
            <div class="lonyo-faq-wrap1 mt-50">
              <div class="lonyo-faq-item open" data-aos="fade-up" data-aos-duration="500">
                <div class="lonyo-faq-header">
                  <h4>Real-Time Expense Tracking:</h4>
                  <div class="lonyo-active-icon">
                    <img class="plasicon" src="assets/images/v1/mynus.svg" alt="">
                    <img class="mynusicon" src="assets/images/v1/plas.svg" alt="">
                  </div>
                </div>
                <div class="lonyo-faq-body">
                  <p>Automatically and syncs with bank accounts and credit cards to provide instant updates on spending, helping users stay aware of their all daily transactions.</p>
                </div>
              </div>
              <div class="lonyo-faq-item" data-aos="fade-up" data-aos-duration="700">
                <div class="lonyo-faq-header">
                  <h4>Comprehensive Financial Overview:</h4>
                  <div class="lonyo-active-icon">
                    <img class="plasicon" src="assets/images/v1/mynus.svg" alt="">
                    <img class="mynusicon" src="assets/images/v1/plas.svg" alt="">
                  </div>
                </div>
                <div class="lonyo-faq-body">
                  <p>Automatically and syncs with bank accounts and credit cards to provide instant updates on spending, helping users stay aware of their all daily transactions.</p>
                </div>
              </div>
              <div class="lonyo-faq-item" data-aos="fade-up" data-aos-duration="900">
                <div class="lonyo-faq-header">
                  <h4>Stress-Reducing Automation:</h4>
                  <div class="lonyo-active-icon">
                    <img class="plasicon" src="assets/images/v1/mynus.svg" alt="">
                    <img class="mynusicon" src="assets/images/v1/plas.svg" alt="">
                  </div>
                </div>
                <div class="lonyo-faq-body">
                  <p>Automatically and syncs with bank accounts and credit cards to provide instant updates on spending, helping users stay aware of their all daily transactions.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  @push('frontend-js')
      <script>
        document.addEventListener("DOMContentLoaded", function () {
        const title = document.getElementById("clarifies_title");

        /**
         * ============================================
         *  SAVE CHANGES FUNCTION (Axios + Vanilla JS)
         * ============================================
         */
        // Save Function
        function saveChanges(element) {

          let titleId = element.dataset.id;
          let field = element.id === "clarifies_title" ? "clarifies" : "";
          let newValue = element.innerText.trim();

          // axios api
          axios.post(`/admin/edit-siteTitle/${titleId}`, {
            [field]: newValue
          })
            .then(function (response) {
              if (response.data.message) {
                // console.log(field + " " + response.data.message);

                // SUCCESS MESSAGE
                toastr.success("Clarifies Title Updated Successfully!");

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