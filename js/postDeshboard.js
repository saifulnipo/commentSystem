var CS = CS || {};

/**
 * This file contain bind event related the post dashboard
 *
 * @author AQM Saiful Islam
 */
CS.postDeshboard = {

    /**
     * Page refresh to load all the posts and comments count in each 30 seconds
     */
    AUTO_PAGE_REFRESH_TIME : 30000,

    /**
     *
     * @param $postId
     */
    loadPostInModal: function (postId) {
        console.log(postId);
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
     */
    loadAllPosts: function () {
        $.ajax({
            type: "POST",
            url: 'index.php',
            data: {
                action: "load_all_post"
            },
            dataType: "json",
            success: function (data) {
                CS.postDeshboard.renderPostDeshboard(data);
            },
            error: function (error) {
                $('.progress').hide();
            }
        });
    },

    /**
     *
     * @param responseData
     */
    renderPostDeshboard: function (responseData) {
        $('.progress').hide();
        var resultTemplate = $('.resultRow'),
            allPostContainer = $('.viewAllPosts');
        allPostContainer.empty();
        if (responseData.length === 0) {
            allPostContainer.append('<div class="alert alert-danger text-center" role="alert">' +
                'No Posts available. Create a new post :-)' +
                '</div>');
            return;
        }

        allPostContainer.append('<h2>Available Posts : ' + responseData.length + ' </h2>');
        $('#postTotalCount').text(responseData.length);
        $.each(responseData, function (index, post) {
            var renderedTemplate = resultTemplate;
            $(renderedTemplate).find('.title strong').text(post.title);
            $(renderedTemplate).find('.shortDescription').text(post.postShortDescription);
            $(renderedTemplate).find('.postTime').text(post.postTime);
            $(renderedTemplate).find('.viewPost').attr('href', post.url);
            $(renderedTemplate).find('.editPost').attr('data-post_id', post.id);
            $(renderedTemplate).find('.deletePost').attr('data-post_id', post.id);
            $(renderedTemplate).find('.commentCount').text(post.commentCount);
            allPostContainer.append(renderedTemplate.html());
        });

        // add bind event to dynamic content
        CS.postDeshboard.bindEditPostClickEvent();
        CS.postDeshboard.bindDeletePostClickEvent();
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

    displayPostModal: function(post) {
        $('#action').val('edit_post');
        $('#post_id').val(post.id);
        $('#postName').val(post.title);
        $('#postEmail').val(post.email);
        $('#postMessage').val(post.postDescription);
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
    bindViewPostDetailsClickEvent: function () {
        $(".viewPost").bind("click", function () {
            if (null !== CS.postDeshboard.pageRefreshPointer) {
                clearInterval(CS.postDeshboard.pageRefreshPointer);
            }
        });
    },

    /**
     * Bind auto refresh only of post deshboard view to get all the latest posts.
     *
     * @return void
     */
    bindAutoRefreshEvent: function () {
        if (CS.postDeshboard.isPostDeshboardOnView()) {
            setInterval(CS.postDeshboard.loadAllPosts, CS.postDeshboard.AUTO_PAGE_REFRESH_TIME);
        }
    },

    /**
     *
     * @returns {boolean}
     */
    isPostDeshboardOnView : function() {
        if ($('#postForm').length > 0) {
            return true;
        }
        return false;
    }
};

$(function () {
    CS.postDeshboard.bindAddPostClickEvent();
    CS.postDeshboard.bindViewPostDetailsClickEvent();
    CS.postDeshboard.bindAutoRefreshEvent();
    CS.postDeshboard.loadAllPosts();
});