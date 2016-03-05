<div class="commentForm col-md-8">
<form id="commentForm" class="form-horizontal" role="form" data-toggle="validator" method="post" action="index.php">
    <input type="hidden" name="comment_id" id="comment_id" value="">
    <input type="hidden" name="post_id" value="<?php echo $postId?>">
    <input type="hidden" name="action" id="action" value="">
    <div class="form-group">
        <label for="name" class="col-md-2 control-label">Name</label>
        <div class="col-md-10">
            <input type="text" class="form-control" id="commenterName" name="commenterName" placeholder="Name" value="" required>
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="col-md-2 control-label">Email</label>
        <div class="col-md-10">
            <input type="email" class="form-control" id="commenterEmail" name="commenterEmail" placeholder="Email" required>
        </div>
    </div>
    <div class="form-group">
        <label for="message" class="col-md-2 control-label">Comments</label>
        <div class="col-md-10">
            <textarea class="form-control" rows="4" id="comment" name="comment" required></textarea>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-2"></div>
        <div class="col-md-10">
            <input id="newCommentSubmitButton" name="newCommentSubmit" type="submit" value="Submit Comment" class="btn btn-primary">
        </div>
    </div>
</form>
<div>