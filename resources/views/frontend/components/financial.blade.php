@php

$title = App\Models\SiteTitle::latest()->first();
$financial = App\Models\Financial::with('tabs')->first();

@endphp
<div class="lonyo-section-padding4 position-relative">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 order-lg-2">
          <div class="lonyo-content-thumb" data-aos="fade-up" data-aos-duration="700">
            <img src="{{ asset('frontend') }}/assets/images/v1/content-thumb2.png" alt="">
          </div>
        </div>
        <div class="col-lg-7 d-flex align-items-center">
          <div class="lonyo-default-content pr-50" data-aos="fade-right" data-aos-duration="700">
            <h2 id="financial_title" class="p-4 rounded" contenteditable="{{ auth()->check() ? 'true' : 'false' }}" data-id="{{ $title->id }}">{{ $financial->title }}</h2>
            <p class="data">{{ $financial->description }}</p>
            <div class="mt-50">
              <ul class="tabs">
                @foreach($financial->tabs as $tab)
                  <li class="{{ ($tab->order_number == 1) ? 'active-tab' : '' }}">
                    <img src="{{ asset($tab->tab_icon) }}" alt="">
                    <h4>{{ $tab->tab_title }}</h4>
                  </li>
                @endforeach
              </ul>
              <ul class="tabs-content">
                 @foreach($financial->tabs as $tab)
                <li>
                  {{ $tab->tab_description }}
                </li>
              @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="lonyo-content-shape2"></div>
  </div>
  <div class="lonyo-content-shape3">
    <img src="{{ asset('frontend') }}/assets/images/shape/shape2.svg" alt="">
  </div>

  @push('frontend-js')
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        const title = document.getElementById("financial_title");


        /**
         * ============================================
         *  SAVE CHANGES FUNCTION (Axios + Vanilla JS)
         * ============================================
         */
        // Save Function
        function saveChanges(element) {

          let titleId = element.dataset.id;
          let field = element.id === "financial_title" ? "financial" : "";
          let newValue = element.innerText.trim();

          // axios api
          axios.post(`/admin/edit-siteTitle/${titleId}`, {
            [field]: newValue
          })
            .then(function (response) {
              if (response.data.message) {
                // console.log(field + " " + response.data.message);
                // SUCCESS MESSAGE
                toastr.success("Financial Title Updated Successfully!");

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