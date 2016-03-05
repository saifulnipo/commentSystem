var CS = CS || {};

CS.postDeshboard = {

    /**
     *
     * @param $postId
     */
    loadPostInModal: function (postId) {
        $.ajax({
            type: "POST",
            url: 'index.php',
            data: {
                action: "load_single_post",
                post_id: postId
            },
            dataType: "json",
            success: function (data) {
                CS.postDeshboard.displayPostModal(data);
            },
            error: function (error) {
            }
        });
    },
    
    /**
     *
     * @param $postId
     */
    deletePost: function (postId) {
        $('#action').val('delete_post');
        $('#post_id').val(postId);
        $('#postForm').submit();
    },

    displayPostModal: function(data) {
        $('#action').val('edit_post');
        $('#postName').val(data.title);
        $('#postEmail').val(data.email);
        $('#postMessage').val(data.postDescription);
        $('#postFormModal').modal('show');
    },

    /**
     * Bind click event action on the checkboxes.
     *
     * @return void
     */
    bindAddPostClickEvent: function () {
        $("#addPostButton").bind("click", function () {
            $('#action').val('add_post');
            $('#postName').val('');
            $('#postEmail').val('');
            $('#postMessage').val('');
            //$('#postForm').reset();
        });
    },

    /**
     * Bind click event action on the checkboxes.
     *
     * @return void
     */
    bindEditPostClickEvent: function () {
        $(".editPost").bind("click", function () {
            var postId = $(this).data('post_id');
            CS.postDeshboard.loadPostInModal(postId);
        });
    },

    /**
     * Bind click event action on the checkboxes.
     *
     * @return void
     */
    bindDeletePostClickEvent: function () {
        $(".deletePost").bind("click", function () {
            var postId = $(this).data('post_id');

            if (confirm('Press Ok will delete this post permanently.\nDo you like to delete?')) {
                CS.postDeshboard.deletePost(postId);
            }
        });
    },

    /**
     * Bind click event action on the checkboxes.
     *
     * @return void
     */
    bindAddCommentsClickEvent: function () {
        $("#newCommentSubmitButton").bind("click", function () {
            $('#action').val('view_comments');
            $('commentForm').submit();
        });
    }
};

$(function () {
    CS.postDeshboard.bindEditPostClickEvent();
    CS.postDeshboard.bindDeletePostClickEvent();
    CS.postDeshboard.bindAddPostClickEvent();

    //comments section
    CS.postDeshboard.bindAddCommentsClickEvent();
});