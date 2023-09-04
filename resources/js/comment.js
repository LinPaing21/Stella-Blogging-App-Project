       // Function to clear the comment value
       function clearCommentValue() {
        var commentBody = document.getElementById("addComment");
        commentBody.value = "";
    }

    // change to comment box
    function inputBox(id) {
        var commentText = document.getElementById(`comment-body${id}`);
        var EditComment = document.getElementById(`edit-comment${id}`);
        var Btn = document.getElementById(`btns${id}`);
        var confirmBtn = document.getElementById(`confirm-btn${id}`);
        Btn.classList.add("d-none");
        commentText.style.display = 'none';
        textarea = document.createElement('textarea');
        textarea.value = commentText.textContent;

        var attr_arr = {
            name: 'body',
            rows: '2',
            id: `form-id${id}`,
            class: 'form-control bg-white',
            required: '',
        }

        for(const key in attr_arr){
            textarea.setAttribute(`${key}`, `${attr_arr[key]}`);
        }

        EditComment.prepend(textarea)
        textarea.focus()
        confirmBtn.classList.remove("d-none")
    };

    // back to comment text
    function cancelInput(id) {
        var commentText = document.getElementById(`comment-body${id}`);
        var EditComment = document.getElementById(`edit-comment${id}`);
        var Btn = document.getElementById(`btns${id}`);
        var confirmBtn = document.getElementById(`confirm-btn${id}`);
        EditComment.removeChild(textarea)
        EditComment.removeChild(small)
        commentText.style.display = 'block';
        Btn.classList.remove("d-none")
        confirmBtn.classList.add("d-none")
    };

    // validation
    function validateValue(id) {
        var EditComment = document.getElementById(`edit-comment${id}`);
        if (textarea.value) {
            EditComment.submit()
        }else {
            if (!document.getElementById('alert-text')) {
                small = document.createElement('small');
            small.classList.add('text-danger')
            small.setAttribute('id', 'alert-text')
            small.innerText = "* Comment Body is Required!"
            EditComment.insertBefore(small, textarea.nextSibling)
            }
        }
    }
