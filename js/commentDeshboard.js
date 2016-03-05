var CS = CS || {};

CS.commentDeshboard = {

    /**
     *
     * @param commentId
     */
    deleteComment: function (commentId) {
        $('#action').val('delete_comment');
        $('#comment_id').val(commentId);
        $('#commentForm').submit();
    },
    
    /**
     * Bind click event action on the checkboxes.
     *
     * @return void
     */
    bindDeleteCommentClickEvent: function () {
        $(".deleteComment").bind("click", function () {
            var commentId = $(this).data('comment_id');

            if (confirm('Press Ok will delete this comment permanently.\nDo you like to delete?')) {
                CS.commentDeshboard.deleteComment(commentId);
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
    CS.commentDeshboard.bindAddCommentsClickEvent();
    CS.commentDeshboard.bindDeleteCommentClickEvent();
});