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


echo '<br><br>';
include('view/header.php');
include('view/showSinglePost.php');
include('view/showAllcomments.php');
include('view/forms/commentForm.php');




