@php

  $slider = App\Models\Slider::latest()->first();

@endphp

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<style>
    /* [contenteditable="true"] {
    border: 2px dashed #007bff;
    padding: 5px;
    border-radius: 5px;
    outline: none;
  }
  [contenteditable="true"]:hover {
    background-color: #f8f9fa;
    cursor: text;
  } */

    .editable-field {
    transition: background 0.4s ease-in-out;
    padding: 3px;
    border-radius: 4px;
}
  </style>

<div class="lonyo-hero-section light-bg">
  <div class="container">
    <div class="row">
      <div class="col-lg-7 d-flex align-items-center">
        <div class="lonyo-hero-content" data-aos="fade-up" data-aos-duration="700">

          <h1 id="slider-title" contenteditable="{{ auth()->check() ? 'true' : 'false' }}" data-id="{{ $slider->id }}"
            class="hero-title py-3 px-2">{{ $slider->title }}
          </h1>

          <p id="slider-description" contenteditable="{{ auth()->check() ? 'true' : 'false' }}"
            data-id="{{ $slider->id }}" class="text py-3 px-2">{{ $slider->description }}</p>

          <div class="mt-50" data-aos="fade-up" data-aos-duration="900">
            <a href="{{ $slider->link }}" class="lonyo-default-btn hero-btn">Contact with US</a>
          </div>

        </div>
      </div>
      <div class="col-lg-5">
        <div class="lonyo-hero-thumb" data-aos="fade-left" data-aos-duration="700">
          <img src="{{ asset('uploads/slider/' . $slider->photo) }}" alt="">

          <div class="lonyo-hero-shape">
            <img src="{{ asset('frontend') }}/assets/images/shape/hero-shape1.svg" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- // CSRF Token --}}
{{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

<!-- Axios CDN -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>

  // document.addEventListener("DOMContentLoaded", function () {
  //   const titleElement = document.getElementById("slider-title");
  //   const descElement = document.getElementById("slider-description");

  //   /**
  //    * ============================================
  //    *  SAVE CHANGES FUNCTION (Axios + Vanilla JS)
  //    * ============================================
  //    */
  //   // Save Function
  //  function saveChanges(element) {

  //     let sliderId = element.dataset.id;
  //     let field = element.id === "slider-title" ? "title" : "description";
  //     let newValue = element.innerText.trim();

  //   // axios api
  //    axios.post(`/admin/edit-slider/${sliderId}`, {
  //           [field]: newValue
  //       })
  //       .then(function (response) {
  //          if (response.data.success) {
  //             // console.log(field + " updated successfully (axios)");

  //             console.log(field + " " + response.data.success);

  //           } else {
  //               console.error("Update failed:", response.data.message);
  //           }

  //           // console.log(`${field} updated successfully`);
  //       })
  //       .catch(function (error) {
  //           console.error("Failed to update:", error);
  //       });
  //   }

  //   /**
  //    * ============================================
  //    *  AUTO SAVE ON PRESSING ENTER
  //    * ============================================
  //    */

  //   // auto save on Enter key
  //   // Auto Save When Press Enter
  //   document.addEventListener("keydown", function (e) {
  //     if (e.key === "Enter") {
  //       e.preventDefault();
  //       saveChanges(e.target);
  //     }

  //   });

    
  //   /**
  //    * ============================================
  //    *  AUTO SAVE WHEN LOSING FOCUS (blur)
  //    * ============================================
  //    */

  //   // Auto Save On Losing Focus
  //   titleElement.addEventListener("blur", function () {
  //     saveChanges(titleElement);
  //   })

  //   descElement.addEventListener("blur", function () {
  //     saveChanges(descElement);
  //   })

  // });

  document.addEventListener("DOMContentLoaded", function () {

    const titleElement = document.getElementById("slider-title");
    const descElement = document.getElementById("slider-description");

    let debounceTimer = null;

    /**
     * =================================================
     * ⭐ SAVE FUNCTION (Axios + Highlight + Toast)
     * =================================================
     */
    function saveChanges(element) {

        const sliderId = element.dataset.id;
        const field = element.id === "slider-title" ? "title" : "description";
        const newValue = element.innerText.trim();

        // highlight saving
        element.style.background = "#fff3cd";

        axios.post(`/admin/edit-slider/${sliderId}`, {
            [field]: newValue
        })
        .then(response => {

            if (response.data.success) {

                // success highlight animation
                element.style.background = "#d4edda";
                setTimeout(() => {
                    element.style.background = "transparent";
                }, 800);

                toastr.success(`${field} updated successfully`);

            } else {
                toastr.error("Update failed: " + response.data.message);
            }

        })
        .catch(error => {
            toastr.error("Failed to save! Check console.");
            console.error(error);
        });
    }

    /**
     * =================================================
     * ⭐ AUTO SAVE (Debounce on typing)
     * =================================================
     * Typing stop = 1 second → auto save
     */
    function debounceSave(element) {

        if (debounceTimer) clearTimeout(debounceTimer);

        debounceTimer = setTimeout(() => {
            saveChanges(element);
        }, 1000);
    }

    /**
     * =================================================
     * ⭐ EVENT LISTENERS
     * =================================================
     */

    // Typing event - auto debounce save
    [titleElement, descElement].forEach(el => {
        el.addEventListener("blur", function () {
            debounceSave(el);
        });
    });

    // Blur event - immediate save
    titleElement.addEventListener("blur", () => saveChanges(titleElement));
    descElement.addEventListener("blur", () => saveChanges(descElement));

    // Enter key - save instantly
    document.addEventListener("keydown", function (e) {
        if (e.key === "Enter") {
            e.preventDefault();
            saveChanges(e.target);
        }
    });

});


</script>