<?php
if ($action === IAppAction::ADD_POST) {
    $postTitle = Parameters::getParam('postName', 'string', '');
    $email = Parameters::getParam('postEmail', 'string', '');
    $postDescription = Parameters::getParam('postMessage', 'string', '');
    $post = (new Post)->setPostTitle($postTitle)->setPostEmail($email)->setPostDescription($postDescription);
    $createStatus = (new Posts)->createPost($post);
}

if ($action === IAppAction::LOAD_SINGLE_POST) {
    $post = (new Posts)->getPostDetails($postId);
    $postDetails = array(
        'title'           => $post->getPostTitle(),
        'email'           => $post->getPostEmail(),
        'postDescription' => $post->getPostDescription()
    );
    echo json_encode($postDetails);
    exit(0);
}

if ($action === IAppAction::LOAD_ALL_POST) {
    $posts = (new Posts)->getAllPosts();
    $allPosts = array();
    foreach ($posts as $post) {
        $postDetails = array(
            'id'               => $post->getPostId(),
            'title'                => $post->getPostTitle(),
            'postTime'             => $post->getPostTime(),
            'postShortDescription' => $post->getShortPostDescription(130),
            'commentCount'         => $post->getCommentCount(),
            'url'                  => sprintf("%s?action=%s&post_id=%s",
                Url::getApplicationUrl(),
                IAppAction::VIEW_POST_DETAILS,
                $post->getPostId()
            )
        );
        $allPosts[] = $postDetails;
    }
    echo json_encode($allPosts);
    exit(0);
}

if ($action === IAppAction::EDIT_POST) {
    $postTitle = Parameters::getParam('postName', 'string', '');
    $email = Parameters::getParam('postEmail', 'string', '');
    $postDescription = Parameters::getParam('postMessage', 'string', '');
    $post = (new Post)->setPostTitle($postTitle)->setPostEmail($email)->setPostDescription($postDescription);
    $createStatus = (new Posts)->updatePost($post);
}

if ($action === IAppAction::DELETE_POST) {
    $deleteStatus = (new Posts)->deletePost($postId);
}

include('view/partials/header.php');
include('view/partials/title.php');
include('view/partials/addNewPost.php');
include('view/forms/postFormModal.php');
include('view/showAllPosts.php');


