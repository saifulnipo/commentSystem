<?php

/**
 * Class Database for db connection
 * @author : AQM Saiful Islam
 */
class Database {
    protected static $connection;

    /**
     * Connect to the database
     *
     * @return bool false on failure / mysqli MySQLi object instance on success
     */
    public function connect() {

        if (!isset(self::$connection)) {
            // Load configuration as an array. Use the actual location of your configuration file
            $config = parse_ini_file('./resource/config.ini');
            self::$connection = new mysqli($config['host'], $config['username'], $config['password'], $config['dbname']);
            // Check connection
            if (self::$connection->connect_error) {
                return false;
            }
        }

        if (self::$connection === false) {
            return false;
        }

        return self::$connection;
    }

    /**
     * Fetch rows from the database (SELECT query)
     *
     * @param $query The query string
     * @return bool False on failure / array Database rows on success
     */
    public function select($query) {
        $rows = array();
        $result = $this->_query($query);
        if($result === false) {
            return false;
        }
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    /**
     * Fetch rows from the database (SELECT query)
     *
     * @param $query The query string
     * @return bool False on failure / array Database rows on success
     */
    public function write($query) {
        $result = false;
        try {
            $connection = $this->connect();
            $stmt = $connection->prepare($query);
            $result = $stmt->execute();
        } catch (\PDOException $e) {
            $result = false;
        }
        return $result;
    }

    /**
     * Fetch the last error from the database
     *
     * @return string Database error message
     */
    public function error() {
        $connection = $this->connect();
        return $connection->error;
    }

    /**
     * Query the database
     *
     * @param $query The query string
     * @return mixed The result of the mysqli::query() function
     */
    private function _query($query) {
        $connection = $this->connect();
        $result = $connection->query($query);

        return $result;
    }
}