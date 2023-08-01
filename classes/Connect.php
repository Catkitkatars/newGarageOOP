<?php
namespace classes;

use SQLite3;

class Connect {

    public $sqlite;

    public function __construct($path)
    {
        $this->sqlite = new SQLite3($path);
    }
}