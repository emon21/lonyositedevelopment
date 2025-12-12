// Custom JS Code

// ================== Single Blog On Comments in JS Code ================ //

// single  blog page js code

// Reply on Form Show
function ReplyForm(id) {
    const form = document.getElementById("reply-form-" + id);
    form.style.display = form.style.display === "none" ? "block" : "none";
}

// reply on show form backup code
function showReplyForm(id) {
    let form = document.getElementById("reply-" + id);

    if (form.style.display === "none") {
        form.style.display = "block";
    } else {
        form.style.display = "none";
    }
}

// load comment

function refreshComments() {
    $("#commentSection").load(location.href + " #commentSection");
}

// Comment Delete
function deleteComment(id) {
    Swal.fire({
        title: "Are you sure?",
        text: "This comment will be deleted!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            axios.delete("/comment-reply-remove/" + id).then((res) => {
                Swal.fire("Deleted!", "Comment removed!", "success");
                refreshComments(); // ✅ only reload comment area
            });
        }
    });
}

// reply on comment

function ReplayComment(commentId) {
    let blog_id = document.getElementById("blog_id").value;
    let parent_id = commentId; // reply er parent comment id
    // let parent_id = document.getElementById("parent_id").value;
    let comment = document.querySelector("#reply-form-" + commentId + " textarea").value;

    // let comment = document.getElementById("comment_id_" + commentId).value;
   
    if (comment === "") {
        alert("Reply cannot be empty!");
        return;
    }

    axios
        .post(COMMENT_STORE_URL, {
            blog_id: blog_id,
            parent_id: parent_id,
            comment: comment,
        })
        .then((res) => {
            // UI clear
            document.querySelector("#reply-form-" + commentId + " textarea").value = "";
            // document.getElementById("comment_id_" + commentId).value = "";

            // // Optional: reply form hide korte chaile
            document.getElementById("reply-form-" + commentId).style.display =
                "none";

            // Success message
            Swal.fire("Replay!", "Reply added successfully!", "success");

            // Reload without full refresh
            // location.reload();
            refreshComments(); // ✅ only reload comment area
        })
        .catch((error) => {
            console.log(error.response.data);
            alert("Something went wrong!");
        });
}


// function ReplayComment() {
//     const blog_id = document.getElementById("blog_id").value;
//     const parent_id = document.getElementById("parent_id").value;
//     const comment = document.getElementById("reply_comment").value;
//     // const comment = textarea?.value?.trim() || "";

//     if (!comment) {
//         alert("Reply cannot be empty!");
//         return;
//     }

//     axios
//         .post(COMMENT_STORE_URL, {
//             blog_id,
//             parent_id,
//             comment,
//         })
//         .then(() => {
//             // Clear textarea
//             // comment.value = "";
//             document.getElementById("reply_comment").value = "";

//             // Hide form
//             // document.getElementById("reply-form").style.display = "none";

//             alert("Reply added successfully!");

//             // Only update comment area
//             refreshComments();
//         })
//         .catch((err) => {
//             console.error(err);
//             alert("Something went wrong!");
//         });
// }

const baseUrl = window.location.href;

//  const COMMENT_STORE_URL = "{{ route('comment.store') }}";
function CreateComment() {

    let blog_id = document.getElementById("blog_id").value;
    let comment = document.getElementById("comment").value;

    axios
        .post(COMMENT_STORE_URL, {
            blog_id: blog_id,
            comment: comment,
        })
        .then(function (res) {
            Swal.fire("Created", "Comment Created successfully!", "success");
            document.getElementById("comment").value = "";
            // refresh only comment section
            refreshComments(); // ✅ only reload comment area
            console.log(res);
        })
        .catch(function (error) {
            console.log(error);
        });
}


// function CreateComment(event) { //parameter
//     event.preventDefault();

//     // let url = event.target.getAttribute('data-url');
//     let blog_id = document.getElementById('blog_id').value;
//     let comment = document.getElementById('comment').value;

//if (comment === "") {
//         alert("Comment cannot be empty!");
//         return;
//     }

//     axios
//         .post("{{ route('comment.store') }}", {
//             blog_id: blog_id,
//             comment: comment,
//         })
//         .then(function (res){

//             Swal.fire('Created', 'Comment Created successfully!', 'success');
//             document.getElementById('comment').value = '';
//             // refresh only comment section
//             refreshComments(); // ✅ only reload comment area
//                 console.log(res);
//         }).catch(function (error){
//             console.log(error);
//         });
// }

// function CreateComment(event) {
//     event.preventDefault(); // button refresh/submit stop

//     let blog_id = document.getElementById('blog_id').value;
//     let comment = document.getElementById('comment').value;

//     if (comment === "") {
//         alert("Comment cannot be empty!");
//         return;
//     }

//     axios.post("{{ route('comment.store') }}", {
//         blog_id: blog_id,
//         comment: comment
//     })
//     .then(function (response) {
//         // Success message
//         alert("Comment posted successfully!");

//         // Comment input clear
//         document.getElementById('comment').value = "";

//         // Reload comments (optional)
//       //   loadComments();
//     })
//     .catch(function (error) {
//         console.error(error);
//         alert("Failed to post comment!");
//     });
// }

// all data show
function loadComments() {
    axios.get("{{ route('comment.list', $blog->id) }}").then((res) => {
        document.getElementById("commentSection").innerHTML = res.data;
    });
}

// submit comment
// function submitComment(id) {
//     let blog_id = document.getElementById("blog_id_" + id).value;
//     let parent_id = document.getElementById("parent_id_" + id).value;
//     let comment = document.getElementById("comment_" + id).value;

//     axios
//         .post("{{ route('comment.store') }}", {
//             blog_id: blog_id,
//             parent_id: parent_id,
//             comment: comment,
//         })
//         .then(function (response) {
//             // alert('✅ Reply posted successfully');

//             // clear textarea
//             document.getElementById("comment_" + id).value = "";

//             // document.getElementById('comment').value = '';
//             Swal.fire("Replay!", "Comment Replay successfully!", "success");
//             // refresh only comment section
//             refreshComments(); // ✅ only reload comment area
//         })
//         .catch(function (error) {
//             console.error(error);
//             alert("❌ Something went wrong!");
//         });
// }

function showEditBox(id) {
    let text = document.getElementById("commentText" + id).innerText;
    document.getElementById("editContent" + id).value = text;
    document.getElementById("editBox" + id).classList.remove("d-none");
    document.getElementById("commentText" + id).classList.add("d-none");
}

function cancelEdit(id) {
    document.getElementById("editBox" + id).classList.add("d-none");
    document.getElementById("commentText" + id).classList.remove("d-none");
}

// update reply comment
function updateComment(id) {
    let content = document.getElementById("editContent" + id).value;

    axios
        .put(`/comment/${id}`, {
            comment: content,
        })
        .then((res) => {
            // update UI
            document.getElementById("commentText" + id).innerText = content;

            // hide box
            cancelEdit(id);

            Swal.fire("Updated!", "Comment updated successfully!", "success");
        })
        .catch((err) => {
            console.log(err);
        });
}


// Admin Reply Toggle the reply box visibility
        function toggleReplyBox(commentId) {
            const box = document.getElementById(`reply-box-${commentId}`);
            box.classList.toggle("hidden");
        }

// Admin Reply
        // function AdminReply(commentId) {
        //     const commentInput = document.getElementById(`comment_id-${commentId}`);
        //     const replyInput = document.getElementById(`reply_id-${commentId}`);

        //     const parent_id = commentInput.value;
        //     const comment = replyInput.value.trim();

        //      //     let reply = replyInput.value;
        // //     if (reply.trim() === "") {
        // //         Swal.fire("Error", "Reply cannot be empty!", "error");
        // //         return;
        // //     }

        //     if (!comment) {
        //         Swal.fire("Error", "Reply cannot be empty!", "error");
        //         return;
        //     }

        //     axios.post(Admin_Reply_Url, { parent_id, comment })
        //         .then(res => {
        //             Swal.fire(
        //                 "Success!",
        //                 "Reply posted successfully!",
        //                 "success"
        //             );

        //             replyInput.value = ""; // clear input
        //             toggleReplyBox(commentId); // collapse box after reply 

        //             if (typeof refreshComments === "function") {
        //                 refreshComments(); // reload comment section dynamically
        //             }

        //             console.log(res.data);
        //         })
        //         .catch(err => {
        //             console.error(err);

        //             if (err.response?.status === 422) {
        //                 Swal.fire("Validation Error", "Reply failed validation!", "error");
        //             } else if (err.response?.status === 419) {
        //                 Swal.fire("Error", "CSRF Token mismatch! Reload page.", "error");
        //             } else {
        //                 Swal.fire("Error", "Something went wrong!", "error");
        //             }
        //         });
        // }


// function AdminReply(commentId) {
//     const comment_id = document.getElementById('comment_id').value;
//     const reply = document.getElementById('reply_id').value.trim();

//     if (!reply) {
//         alert("Reply cannot be empty!");
//         return;
//     }

//     axios
//         .post(Admin_Reply_Url, {
//             comment_id: comment_id,
//             reply: reply,
//         })
//         .then((response) => {
//             if (response.data.success) {
//                 // Clear textarea
//                document.getElementById("reply_id").value = "";
                               
//                 // alert(response.data.message);

//                 Swal.fire("Success!","Reply posted successfully!","success");
//                  refreshComments();
//             }
//         })
//         .catch((error) => {
//             console.error(error);
//             alert("Something went wrong.");
//         });
// }




// admin Reply 
function AdminReply(replyId) {
    const comment_id = document.getElementById(`comment_id${replyId}`).value;
    const replyText = document.getElementById(`reply_text_${replyId}`).value.trim();

         if (replyText.trim() === "") {
             Swal.fire("Error", "Reply cannot be empty!", "error");
             return;
         }
    if (!replyText) {
        alert("Reply cannot be empty!");
        return;
    }

    axios
        .post(Admin_Reply_Url, {
            comment_id: comment_id,
            reply: replyText,
        })
        .then((response) => {
            if (response.data.success) {
                // Clear the textarea
                document.getElementById(`reply_text_${replyId}`).value = "";

                // Optionally hide the form
                document.getElementById(`reply-form-${replyId}`).style.display =
                    "none";
                Swal.fire("Success!", "Reply By Admin successfully!", "success");

                refreshComments();
            }
        })
        .catch((error) => {
            console.error(error);
            alert("Something went wrong!");
        });
}
