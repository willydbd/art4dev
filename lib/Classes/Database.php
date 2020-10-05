<?php
/**
 * @Author
 * Falua Temitope Oyewole.
 * faluatemitopeo@gmail.com
 * Web Developer
 * Date: 4/4/2018
 */
//session_start();
//if (!defined('DEBUG')) define('DEBUG',true);

class Database
{
    #! -- credentials for database connection
    private $conn;
    private $_HOST = 'localhost';
    private $_USER = 'admin';
    private $_PASS = 'admin123';
    private $_DBNAME = 'art4dev';

    /**
     * Set the connection to the database
    */
    public function dbConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" .$this->_HOST .";dbname=" .$this->_DBNAME, $this->_USER, $this->_PASS);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;

        } catch (Exception $ex) {
            echo "<h1>Error in connection: ". $ex->getMessage(). "</h1>";
        }
    }

    /**
     * close the connection
    */
    public function closeDB() {
        $this->conn = null;
    }
}
