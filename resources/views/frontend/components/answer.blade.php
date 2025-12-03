@php

$title = App\Models\SiteTitle::latest()->first();
$answers = App\Models\Answer::latest()->limit(5)->get();

@endphp
<div class="lonyo-section-padding4">
    <div class="container">
      <div class="lonyo-section-title center">
       <h2 id="answers_title" class="p-4 rounded" contenteditable="{{ auth()->check() ? 'true' : 'false' }}" data-id="{{ $title->id }}">{{ $title->answers }}</h2>
      </div>
      <div class="lonyo-faq-shape"></div>
      <div class="lonyo-faq-wrap1">
        @foreach($answers as $answer)
          {{-- <div class="lonyo-faq-item item2 open" data-aos="fade-up" data-aos-duration="500"> --}}
          <div class="lonyo-faq-item item2" data-aos="fade-up" data-aos-duration="500">
            <div class="lonyo-faq-header">
              <h4>{{ $answer->title }}</h4>
              <div class="lonyo-active-icon">
                <img class="plasicon" src="{{ asset('frontend') }}/assets/images/v1/mynus.svg" alt="">
                <img class="mynusicon" src="{{ asset('frontend') }}/assets/images/v1/plas.svg" alt="">
              </div>
            </div>
            <div class="lonyo-faq-body body2">
              <p>{{ $answer->description }}</p>
            </div>
          </div>
        @endforeach
       
        
      </div>
      
      <div class="faq-btn" data-aos="fade-up" data-aos-duration="700">
        <a class="lonyo-default-btn faq-btn2" href="faq.html">Can't find your answer</a>
      </div>
    </div>
  </div>
  <div class="lonyo-content-shape3">
    <img src="{{ asset('frontend') }}/assets/images/shape/shape2.svg" alt="">
  </div>
  @push('frontend-js')
    <script>
      document.addEventListener("DOMContentLoaded", function () {
        const title = document.getElementById("answers_title");


        /**
         * ============================================
         *  SAVE CHANGES FUNCTION (Axios + Vanilla JS)
         * ============================================
         */
        // Save Function
        function saveChanges(element) {

          let titleId = element.dataset.id;
          let field = element.id === "answers_title" ? "answers" : "";
          let newValue = element.innerText.trim();

          // axios api
          axios.post(`/admin/edit-siteTitle/${titleId}`, {
            [field]: newValue
          })
            .then(function (response) {
              if (response.data.message) {
                // console.log(field + " " + response.data.message);
                // SUCCESS MESSAGE
                toastr.success("Answers Title Updated Successfully!");

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