<button
    type="button"
    id="addPostButton"
    class="btn btn-info btn-lg pull-right"
    data-toggle="modal"
    data-target="#postFormModal">
    Create New Post
</button>
<?php
$posts = (new Posts)->getAllPosts();
$postsCount = count($posts);
if ( $postsCount > 0) {
    echo sprintf('<h2>Available Posts : %d </h2>', $postsCount);
}
echo '<div class="list-group">';
foreach ($posts as $post) { ?>

    <div  class="list-group-item">
        <div class="row">
            <div class="col-md-12 pull-left"><strong><?php echo $post->getPostTitle();?></strong></div>
            <div class="col-md-12"><?php echo $post->getPostDescription();?></div>
            <div class="col-md-2 pull-right">
                <span><i class="glyphicon glyphicon-calendar"></i><?php echo $post->getPostTime();?></span>
            </div>

            <div class="col-md-2 pull-left">
                <a class="viewPost" href="<?php echo Url::getApplicationUrl() . '?action=' . IAppAction::VIEW_POST . '&post_id=' . $post->getPostId();?>">
                    <i class="glyphicon glyphicon-folder-open"></i> view details
                </a>
            </div>

            <div class="col-md-1 pull-left">
                <a class="editPost" href="#" data-post_id="<?php echo $post->getPostId();?>">
                    <i class="glyphicon glyphicon-edit"></i>edit
                </a>
            </div>

            <div class="col-md-1 pull-left">
                <a class="deletePost" href="#" data-post_id="<?php echo $post->getPostId();?>">
                    <i class="glyphicon glyphicon-remove"></i>delete
                </a>
            </div>

            <div class="col-md-2 pull-right">
                <span><i class="glyphicon glyphicon-comment"></i> <?php echo $post->getCommentCount();?> comments</span>
            </div>
        </div>
    </div>
    <?php
}
echo '</div>';


