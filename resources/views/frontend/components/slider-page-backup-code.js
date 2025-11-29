
{{-- // CSRF Token --}}
<meta name="csrf-token" content="{{ csrf_token() }}">

<script>

  document.addEventListener("DOMContentLoaded", function () {
    const titleElement = document.getElementById("slider-title");
    const descElement = document.getElementById("slider-description");


    // Save Function
    function saveChanges(element) {
      let sliderId = element.dataset.id;
      let field = element.id === "slider-title" ? "title" : "description";
      let newValue = element.innerText.trim();

      // fetch api

      fetch(`/admin/edit-slider/${sliderId}`, {
        method: "POST",
        headers: {
          "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]').getAttribute("content"), "Content-Type": "application/json"
        },
        body: JSON.stringify({ [field]: newValue })
      }).then(response => response.json())
        .then(data => {
          if (data.success) {
            console.log(`${field} updated successfully`);
          } else {
            console.error("Update failed:", data.message);
          }
        })
        .catch(error => console.error("Error :", error));
    }

    // auto save on Enter key
    // Auto Save When Press Enter
    document.addEventListener("keydown", function(e){
      if(e.key === "Enter"){
      e.preventDefault();
      saveChanges(e.target);
    }

  });

  // Auto Save On Losing Focus
  titleElement.addEventListener("blur", function () {
    saveChanges(titleElement);
  })

  descElement.addEventListener("blur", function () {
    saveChanges(descElement);
  })

  });


   // fetch api
    //   try {
    //     const response = fetch(`/admin/edit-slider/${sliderId}`, {
    //       method: "POST",
    //       headers: {
    //         "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
    //         "Content-Type": "application/json"
    //       },
    //       body: JSON.stringify({ [field]: newValue })
    //     });

    //     const data = response.json();

    //     if (data.success) {
    //       console.log(`${field} updated successfully`);
    //     } else {
    //       console.error("Failed to update:", data.message);
    //     }

    //   }
    //   catch (error) {
    //     console.error("Error:", error);
    //   }

    // }



//   document.addEventListener("DOMContentLoaded", function () {
    
//     const titleElement = document.getElementById("slider-title");
//     const descElement = document.getElementById("slider-description");

//     // Save Function
//     async function saveChanges(element) {
//         const sliderId = element.dataset.id;
//         const field = element.id === "slider-title" ? "title" : "description";
//         const newValue = element.innerText.trim();

//         try {
//             const response = await fetch(`/admin/edit-slider/${sliderId}`, {
//                 method: "POST",
//                 headers: {
//                     "X-CSRF-TOKEN": document
//                         .querySelector('meta[name="csrf-token"]')
//                         .getAttribute("content"),
//                     "Content-Type": "application/json"
//                 },
//                 body: JSON.stringify({ [field]: newValue })
//             });

//             const data = await response.json();

//             if (data.success) {
//                 console.log(`${field} updated successfully`);
//             } else {
//                 console.error("Update failed:", data.message);
//             }

//         } catch (error) {
//             console.error("Error:", error);
//         }
//     }

//     // Auto Save When Press Enter
//     document.addEventListener("keydown", function (e) {
//         if (e.key === "Enter") {
//             e.preventDefault();
//             saveChanges(e.target);
//         }
//     });

//     // Auto Save On Losing Focus
//     titleElement.addEventListener("blur", function () {
//         saveChanges(titleElement);
//     });

//     descElement.addEventListener("blur", function () {
//         saveChanges(descElement);
//     });

// });

// more code

    
  document.addEventListener("DOMContentLoaded", function () {

    const titleElement = document.getElementById("slider-title");
    const descElement = document.getElementById("slider-description");

    let debounceTimer = null;

    /**
     * =============================================
     * ⭐ SHOW / HIDE LOADER + DISABLE EDITING
     * =============================================
     */
    function showLoader(element) {
      const wrapper = element.closest(".editable-wrapper");
      const loader = wrapper.querySelector(".loader");

      loader.style.display = "block";
      element.setAttribute("contenteditable", "false");
    }

    function hideLoader(element) {
      const wrapper = element.closest(".editable-wrapper");
      const loader = wrapper.querySelector(".loader");

      loader.style.display = "none";
      element.setAttribute("contenteditable", "true");
    }

    /**
     * =============================================
     * ⭐ SAVE FUNCTION (Axios + Highlight + Toast)
     * =============================================
     */
    function saveChanges(element) {

      const sliderId = element.dataset.id;
      const field = element.id === "slider-title" ? "title" : "description";
      const newValue = element.innerText.trim();

      // Show loader + disable editing
      showLoader(element);

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

            toastr.success(`${field} updated`);

          } else {
            toastr.error("Update failed: " + response.data.message);
          }

        })
        .catch(error => {
          toastr.error("Failed to save!");
          console.error(error);
        })
        .finally(() => {
          // Hide loader + re-enable editing
          hideLoader(element);
        });
    }

    /**
     * =============================================
     * ⭐ DEBOUNCE SAVE (Typing stop = 1 sec)
     * =============================================
     */
    function debounceSave(element) {

      if (debounceTimer) {
        clearTimeout(debounceTimer);
      }

      debounceTimer = setTimeout(() => {
        saveChanges(element);
      }, 1000);
    }

    /**
     * =============================================
     * ⭐ EVENT LISTENERS
     * =============================================
     */

    // Typing event - auto debounce save
    [titleElement, descElement].forEach(el => {
      el.addEventListener("input", function () {
        debounceSave(el);
      });
    });

    // Blur event - save immediately
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
