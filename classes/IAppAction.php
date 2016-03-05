<?php

/**
 * Interface IAppAction
 */
interface IAppAction {
    const VIEW_POST      = 'view_post';
    const LOAD_SINGLE_POST = 'load_single_post';
    const EDIT_POST      = 'edit_post';
    const ADD_POST      = 'add_post';
    const DELETE_POST    = 'delete_post';
    const VIEW_COMMENT   = 'view_comments';
    const DELETE_COMMENT = 'delete_comment';
}