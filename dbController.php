<?php

class Db {

    protected $host = 'localhost';
    protected $db = 'raw_api';
    protected $dbUser = 'root';
    protected $dbpass = '';
        
    /**
     * connecting to a database
     *
     * @return MysqliConnection
     */
    public function connect()
    {
        $conn = new mysqli($this->host, $this->dbUser, $this->dbpass, $this->db);
        
        if($conn->connect_error) die("Failed to connect to databse" . $conn->connect_error);

        return $conn;
    }



}