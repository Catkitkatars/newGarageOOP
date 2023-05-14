<?php
require_once 'Connect.php';

class DataHandler extends Connect
{


    public function __construct()
    { 
        parent::__construct(); // зачем?
    }

    public function getColumnNames() 
    {
        $columnsNames = [];

        $sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '$this->dbname' AND TABLE_NAME = '$this->tableName'";

        $sqlResult = $this->connect->query($sql);

        while ($sqlArray = $sqlResult->fetch_assoc()) { // Задать вопрос, почему такое работает
            array_push($columnsNames, $sqlArray["COLUMN_NAME"]);
        }

        if(count($columnsNames) == 0)
        {
            return die("Таблица пустая");
        } 

        return $columnsNames;
    }

    public function getData() 
    {
        $data = [];
        $datas = mysqli_query($this->connect, "SELECT * FROM `$this->tableName`");
        $datas = mysqli_fetch_all($datas);
        
        foreach ($datas as $key => $values) {
            $arrayCombine = array_combine($this->getColumnNames(), $values);
            array_push($data, $arrayCombine);
        }
        return $data;
    }

    public function getOneData()
    {
        $id = $_GET['id'];

        $data = mysqli_query($this->connect, "SELECT * FROM `$this->tableName` WHERE id = '$id'");
        $data = mysqli_fetch_all($data);
        return $data[0];
    }

    public function addData()
    {   
        $keys = ['id'];
        $values = [];

        foreach ($_POST as $key => $value) {
            array_push($keys, $key);
            array_push($values, $value);
        }

        $keys = array_map(function($item) {
            return "`$item`";
        }, $keys);

        $values = array_map(function($item) {
            return "'" . $item . "'";
        }, $values);

        $keys  = implode(', ', $keys );
        $values = implode(', ', $values);

        $query = "INSERT INTO `$this->tableName` ($keys) VALUES (NULL".','."$values)";

        mysqli_query($this->connect, $query);
    }

    public function editData() 
    {
        $id = $_GET['id'];
        if(!$id){
            return die('ID not found');
        }
        $query = '';
        foreach ($_POST as $key => $value) {
            $query .= "`$key` = '$value',";
        }
        $query = rtrim($query, ',');
        $query = "UPDATE `$this->tableName` SET ". $query ." WHERE `$this->tableName`.`id` = '$id'";
  
        mysqli_query($this->connect, $query);
    }

    public function deleteData()
    {
        $id = $_GET['id'];
        if(!$id){
            return die('ID not found');
        }
        mysqli_query($this->connect, "DELETE FROM `$this->tableName` WHERE `$this->tableName`.`id` = '$id'");
    }
}