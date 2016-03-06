<?php
include('classloader.php');


$postId = Parameters::getParam('post_id', 'string', '');
$action = Parameters::getParam('action', 'string', '');

switch($action) {
    case IAppAction::VIEW_POST_DETAILS :
        include('view/deshboard/commentDeshboard.php');
        break;

    case IAppAction::LOAD_ALL_POST :
    case IAppAction::LOAD_SINGLE_POST :
    case IAppAction::EDIT_POST :
    case IAppAction::DELETE_POST :
        include('view/deshboard/postDeshboard.php');
        break;

    case IAppAction::VIEW_COMMENT :
    case IAppAction::DELETE_COMMENT :
        include('view/deshboard/commentDeshboard.php');
        break;
    default:
        include('view/deshboard/postDeshboard.php');
}

include('view/partials/footer.php');
