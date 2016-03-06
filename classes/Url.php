<?php
/**
 * Class Posts
 */
class Url {

    /**
     * Default server port
     */
    CONST DEFAULT_SERVER_PORT = 80;

    /**
     * SSL port
     */
    const SSL_SERVER_PORT = 443;

    /**
     * @return string
     */
    public static function getBaseUrl()
    {
        return self::getProtocol() .$_SERVER['SERVER_NAME'] . '/';
    }

    /**
     * @return string
     */
    public static function getApplicationUrl()
    {
        $config = parse_ini_file('./resource/config.ini');
        return self::getBaseUrl() . $config['application_name']. '/';
    }

    /**
     * Return the protocol type http or https in dependency of the current request.
     *
     * @return string
     */
    public static function getProtocol()
    {
        if (self::SSL_SERVER_PORT === self::getServerPort()) {
            return 'https://';
        }

        return 'http://';
    }

    /**
     * Return the server port
     *
     * @return int
     */
    public static function getServerPort()
    {
        if (isset($_SERVER['SERVER_PORT'])) {
            return (int) $_SERVER['SERVER_PORT'];
        }

        return self::DEFAULT_SERVER_PORT;
    }

    /**
     * Return the current request url.
     *
     * @return string Requested url
     */
    public static function getRequestUrl()
    {
        $request_uri = '';

        if (isset($_SERVER['REQUEST_URI'])) {
            $request_uri =  $_SERVER['REQUEST_URI'];
        }

        return self::getProtocol() . self::getBaseUrl() . $request_uri;
    }

}