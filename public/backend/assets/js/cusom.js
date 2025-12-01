

// 
function deleteConfirmation(ev) {
  Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Yes, delete it!',
    cancelButtonText: 'Cancel',
    reverseButtons: true
  }).then((result) => {
    if (result.isConfirmed) {
      // Option A: রেডাইরেক্ট করে সার্ভার সাইড ডিলিট রাউটে পাঠানো
      // window.location.href = `/items/${id}/delete`; 

      // Option B: অথবা একটি ফর্ম সাবমিট করে (CSRF প্রয়োজন হলে এই প্যাটার্ন ভালো)
      const form = document.createElement('form');
      form.method = 'POST';
      form.action = `/items/${id}`; // আপনার ডিলিট রুট
      // Laravel-style: spoof _method and csrf
      const methodInput = document.createElement('input');
      methodInput.name = '_method';
      methodInput.value = 'DELETE';
      form.appendChild(methodInput);

      const csrfInput = document.createElement('input');
      csrfInput.name = '_token';
      csrfInput.value = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
      form.appendChild(csrfInput);

      document.body.appendChild(form);
      form.submit();
    } else if (result.dismiss === Swal.DismissReason.cancel) {
      Swal.fire('Cancelled', 'Your item is safe :)', 'info');
    }
  });
}

// Optional: delegated click if you use data-id attributes
document.addEventListener('click', function(e) {
  if (e.target.matches('.btn-delete')) {
    const id = e.target.dataset.id;
    deleteConfirmation(id);
  }
});

// Delete data in sweet alert
function deleteConfirm(event) {
    // Prevent the default form submission
    event.preventDefault();

   //  Swal.fire({
   //      title: 'Are you sure?',
   //      text: "You won't be able to revert this!",
   //      icon: 'warning',
   //      showCancelButton: true,
   //      confirmButtonColor: '#3085d6',
   //      cancelButtonColor: '#d33',
   //      confirmButtonText: 'Yes, delete it!'
   //  }).then((result) => {
   //      if (result.isConfirmed) {
   //          // If confirmed, submit the form
   //          event.target.closest('form').submit();
   //      }
   //  });


    Swal.fire({
  title: "Are you sure?",
  text: "You won't be able to revert this!",
  icon: "warning",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Yes, delete it!"
}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire({
      title: "Deleted!",
      text: "Your file has been deleted.",
      icon: "success"
    });

    // If confirmed, submit the form
    event.target.closest('form').submit();

  }
});
   
}