<?php
$comments = (new Comments)->getAllCommentsOfPost($postId);
$commentCount = count($comments);
if ($commentCount > 0) {
    echo sprintf('<h4>Available Comments : %d </h4>', $commentCount);
}
echo '<div class="list-group">';
foreach ($comments as $comment) { ?>

    <div  class="list-group-item">
        <div class="row">
            <div class="col-md-12 pull-left">Comments by <strong><?php echo $comment->getCommenterName();?></strong></div>
            <div class="col-md-12"><?php echo $comment->getCommentDescription();?></div>

            <div class="col-md-2 pull-left">
                <a class="deleteComment" href="#" data-comment_id="<?php echo $comment->getCommentId();?>">
                    <i class="glyphicon glyphicon-remove"></i>delete
                </a>
            </div>

            <div class="col-md-2 pull-right">
                <span><i class="glyphicon glyphicon-calendar"></i><?php echo $comment->getCommentTime();?></span>
            </div>
        </div>
    </div>
    <?php
}
echo '</div>';