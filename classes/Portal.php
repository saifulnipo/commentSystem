<?php

/**
 * Class Portal
 * author: AQM Saiful Islam
 */
class Portal
{
    /**
     * Initialize the portal and checking the DB connection
     */
    public static function init()
    {
        $db = new Database();
        if (false === $db->connect()) {
            include('view/partials/noDatabseConnectionMsg.php');
            exit;
        }
    }

    /**
     * Write variable from php to js
     */
    public static function writePageRefreshRateInfoToJS()
    {
        $config = parse_ini_file('./resource/config.ini');
        if (false !== $config) {
            $variable = array('page_refresh_rate' => (int)$config['page_refresh_rate']);
            echo sprintf(
                '<script>var variable = %s</script>',
                json_encode($variable)
            );
        }
    }
}