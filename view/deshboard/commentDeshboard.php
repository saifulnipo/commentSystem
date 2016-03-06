<?php
if ('' === $postId) {
    return;
}

if('' !== Parameters::getParam('newCommentSubmit', 'string', '')) {
    $commenterName = Parameters::getParam('commenterName', 'string', '');
    $commenterEmail = Parameters::getParam('commenterEmail', 'string', '');
    $commentMessage = Parameters::getParam('comment', 'string', '');
    $comment = (new Comment)->setCommenterName($commenterName)
        ->setCommenterEmail($commenterEmail)
        ->setCommentDescription($commentMessage)
        ->setCommentOnPostId($postId);
    $createStatus = (new Comments)->createComment($comment);
}

if ($action === IAppAction::DELETE_COMMENT) {
    $commentId = Parameters::getParam('comment_id', 'string', '');
    $deleteStatus = (new Comments)->deleteComment($commentId);
}

$post = (new Posts)->getPostDetails($postId);

include('view/partials/header.php');
include('view/partials/backToPostDeshboard.php');
echo '<br><br>';

if (null === $post) {
    include('view/partials/noPostFoundMsg.php');
    return;
}

include('view/showSinglePost.php');
include('view/showAllcomments.php');
include('view/forms/commentForm.php');
