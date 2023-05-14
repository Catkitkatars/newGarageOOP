<?php

class Connect {
    protected $servername = "localhost";
    protected $username = "root";
    protected $password = "root";
    protected $dbname = "first_db";
    protected $tableName = "GarageWithCars";

    protected $connect;

    public function __construct()
    {
        $this->connect = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
    }
}