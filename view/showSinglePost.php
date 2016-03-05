<?php $post = (new Posts)->getPostDetails($postId);?>
<a href="<?php echo Url::getApplicationUrl();?>" class="btn btn-info btn-lg pull-right">Post Dashboard</a>
<div class="well">
    <div class="media-body">
        <h3 class="media-heading">Post title : <?php echo $post->getPostTitle();?></h3>
        <p><?php echo $post->getPostDescription();?></p>
    </div>
</div>