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

include('view/header.php');
include('view/showAllPosts.php');
include('view/forms/postFormModal.php');


