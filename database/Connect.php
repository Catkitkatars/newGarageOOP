<?php

class Connect {
    public $servername;
    public $username;
    public $password;
    public $dbname;
    public $tableName;

    public $mysqli;

    public function __construct($servername, $username, $password, $dbname, $tableName)
    {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
        $this->tableName = $tableName;

        $this->mysqli = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
    }
}