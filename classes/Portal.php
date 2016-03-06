<?php

/**
 * Class Portal
 * author: AQM Saiful Islam
 */
class Portal
{
    public static function init()
    {
        $db = new Database();
        if (false === $db->connect()) {
            include('view/partials/noDatabseConnectionMsg.php');
            exit;
        }
    }
}