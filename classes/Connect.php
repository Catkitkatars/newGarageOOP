<?php
namespace classes;
class Connect {
    public $servername;
    public $username;
    public $password;
    public $dbname;

    public $mysqli;

    public function __construct($servername, $username, $password, $dbname)
    {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;

        $this->mysqli = new \mysqli($this->servername, $this->username, $this->password, $this->dbname);
    }
}