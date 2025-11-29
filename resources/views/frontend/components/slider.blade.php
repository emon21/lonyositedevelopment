@php

  $slider = App\Models\Slider::latest()->first();

@endphp


<style>
  .editable-wrapper {
    position: relative;
    display: inline-block;
    width: 100%;
  }

  .editable-field {
    transition: background 0.4s;
    padding: 5px;
    border-radius: 4px;
    min-height: 32px;
    border: 1px solid transparent;
  }

  .editable-field[contenteditable="false"] {
    opacity: 0.6;
    cursor: not-allowed;
  }

  /* Loader Circle */
  .loader {
    position: absolute;
    right: 8px;
    top: 50%;
    transform: translateY(-50%);

    width: 18px;
    height: 18px;
    border: 3px solid #ccc;
    border-top-color: #333;
    border-radius: 50%;
    animation: spin 0.7s linear infinite;
    display: none;
  }

  @keyframes spin {
    to {
      transform: translateY(-50%) rotate(360deg);
    }
  }
</style>

<div class="lonyo-hero-section light-bg">
  <div class="container">
    <div class="row">
      <div class="col-lg-7 d-flex align-items-center">
        <div class="lonyo-hero-content" data-aos="fade-up" data-aos-duration="700">

          <h1 id="slider-title" contenteditable="{{ auth()->check() ? 'true' : 'false' }}" data-id="{{ $slider->id }}"
            class="hero-title py-2 px-3 editable-wrapper">{{ $slider->title }}
          </h1>

          <p id="slider-description" contenteditable="{{ auth()->check() ? 'true' : 'false' }}"
            data-id="{{ $slider->id }}" class="text py-2 px-3 editable-wrapper">{{ $slider->description }}</p>

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
{{--
<meta name="csrf-token" content="{{ csrf_token() }}"> --}}

<!-- Axios CDN -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>

  document.addEventListener("DOMContentLoaded", function () {
    const titleElement = document.getElementById("slider-title");
    const descElement = document.getElementById("slider-description");

    /**
     * ============================================
     *  SAVE CHANGES FUNCTION (Axios + Vanilla JS)
     * ============================================
     */
    // Save Function
    function saveChanges(element) {

      let sliderId = element.dataset.id;
      let field = element.id === "slider-title" ? "title" : "description";
      let newValue = element.innerText.trim();

      // axios api
      axios.post(`/admin/edit-slider/${sliderId}`, {
        [field]: newValue
      })
        .then(function (response) {
          if (response.data.message) {
            // console.log(field + " " + response.data.message);
            // SUCCESS MESSAGE
            toastr.success(response.data.message);

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
    titleElement.addEventListener("blur", function () {
      saveChanges(titleElement);
    })

    descElement.addEventListener("blur", function () {
      saveChanges(descElement);
    })

  });


</script>