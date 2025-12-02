@php

$title = App\Models\SiteTitle::latest()->first();
$usability = App\Models\Usability::latest()->first();

@endphp

<style>
  .spinner {
    border: 3px solid #ddd;
    border-top: 3px solid #3498db;
    border-radius: 50%;
    width: 15px;
    height: 15px;
    animation: spin 0.7s linear infinite;
    display: inline-block;
    margin-left: 5px;
    margin-top:20px;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

</style>

<div class="lonyo-section-padding bg-heading position-relative sectionn">
  <div class="container">
    <div class="row">
      <div class="col-lg-5">
        <div class="lonyo-video-thumb">
          <img
            src="{{ $usability->image ? asset('uploads/usability/' . $usability->image) : asset('uploads/no_image.jpg') }}"
            alt="">
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

    @php
$usabilityConnect = App\Models\UsabilityConnect::whereIn('id', [1, 2, 3])->get()->keyBy('id');
    @endphp

    <div class="row">
      @foreach ($usabilityConnect as $connect)
        <div class="col-xl-4 col-md-6">
          <div class="lonyo-process-wrap" data-aos="fade-up" data-aos-duration="500">
            <div class="lonyo-process-number">
              <img src="{{ asset('frontend/assets/images/v1/n' . $connect->id . '.svg') }}" alt="">
            </div>
            <div class="lonyo-process-title">
              <h4 id="title" class="p-3 editable" contenteditable="{{ auth()->check() ? 'true' : 'false' }}" data-id="{{ $connect->id }}" data-field="title">{{ $connect->title }}</h4>
            <!-- Loader -->
               <span class="my-4 save-status" style="font-size: 13px; color: #666;"></span>
            </div>
            <div class="lonyo-process-data">
              <p id="description" class="p-3 editable" contenteditable="{{ auth()->check() ? 'true' : 'false' }}" data-id="{{ $connect->id }}"
            data-field="description">{{ $connect->description }}</p>
            <!-- Loader -->
             <span class="my-4 save-status" style="font-size: 13px; color: #666;"></span>
            </div>
          </div>
         
        </div>
      @endforeach
      <div class="border-bottom" data-aos="fade-up" data-aos-duration="500"></div>
    </div>
  </div>
</div>
<div class="lonyo-content-shape1">
  <img src="{{ asset('frontend') }}/assets/images/shape/shape3.svg" alt="">
</div>

@push('frontend-js')
  {{-- <script>
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

  </script> --}}


<script>

// 👉 ফলাফল: আপনি content change করে cursor বাইরে নিলেই update হবে।
      // document.querySelectorAll(".editable").forEach(function (element) {
      //    element.addEventListener("blur", function () {
      //       let id = this.dataset.id;
      //       let field = this.dataset.field;
      //       let value = this.innerText;

      //       axios.post("/admin/usability-connect/update-field", {
      //          id: id,
      //          field: field,
      //          value: value,
      //       }).then(res => {
      //          toastr.success(res.data.message);
      //       });
      //    });
      // });





      // ✅ Option 2: টাইপ করার সাথে সাথেই Auto Save (Debounce সহ)
      // 👉 ফলাফল: ইউজার টাইপ বন্ধ করলে 0.8 সেকেন্ড পরে auto update হবে।
//       let timer = null;

// document.querySelectorAll(".editable").forEach(function (element) {

//     element.addEventListener("input", function () {

//         clearTimeout(timer);

//         timer = setTimeout(() => {
//             let id = this.dataset.id;
//             let field = this.dataset.field;
//             let value = this.innerText;

//             axios.post("/admin/usability-connect/update-field", {
//                 id,
//                 field,
//                 value,
//             }).then(res => {
//                 toastr.success(res.data.message);
//             });

//         }, 500); // 0.5 sec pause দিলে save হবে // টাইপ বন্ধ করলে 0.5 sec পরে auto save
//     });
// });

let debounceTimer = null;

document.querySelectorAll(".editable").forEach(function (element) {

    const status = element.nextElementSibling; // save-status span

    element.addEventListener("input", function () {

        clearTimeout(debounceTimer);

        // show loading spinner instantly
        status.innerHTML = `<span class="spinner"></span> Saving...`;

        debounceTimer = setTimeout(() => {

            let id = this.dataset.id;
            let field = this.dataset.field;
            let value = this.innerText;

            axios.post("/admin/usability-connect/update-field", {
                id,
                field,
                value
            }).then(res => {

                // show success text
                status.innerHTML = `<span style="color:green;">✔ Saved</span>`;

                // optional: Toastr message
                toastr.success(res.data.message);

                // remove saved text after 2s
                setTimeout(() => {
                    status.innerHTML = "";
                }, 2000);
            });

        }, 500); // debounce delay
    });
});

   </script>

@endpush