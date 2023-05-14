<?php
require_once 'Connect.php';

class DataHandler extends Connect
{

    public function getColumnNames() 
    {
        $columnsNames = [];

        $sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '$this->dbname' AND TABLE_NAME = '$this->tableName'";

        $sqlResult = $this->connect->query($sql);

        while ($sqlArray = $sqlResult->fetch_assoc()) { 
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
        $finishedData = [];
        $sql = "SELECT * FROM `$this->tableName`";
        $data = $this->connect->query($sql)->fetch_all();
        
        foreach ($data as $key => $values) {
            $arrayCombine = array_combine($this->getColumnNames(), $values);
            array_push($finishedData, $arrayCombine);
        }
        return $finishedData;
    }

    public function getOneData()
    {
        $id = $_GET['id'];
        $sql = "SELECT * FROM `$this->tableName` WHERE id = '$id'";

        $data = $this->connect->query($sql)->fetch_all();
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

        $sql = "INSERT INTO `$this->tableName` ($keys) VALUES (NULL".','."$values)";

        $this->connect->query($sql);
    }

    public function editData() 
    {
        $id = $_GET['id'];
        if(!$id){
            return die('ID not found');
        }
        $sql = '';
        foreach ($_POST as $key => $value) {
            $sql .= "`$key` = '$value',";
        }
        $sql = rtrim($sql, ',');
        $sql = "UPDATE `$this->tableName` SET ". $sql ." WHERE `$this->tableName`.`id` = '$id'";

        $this->connect->query($sql);
    }

    public function deleteData()
    {
        $id = $_GET['id'];
        $sql = "DELETE FROM `$this->tableName` WHERE `$this->tableName`.`id` = '$id'";
        if(!$id){
            return die('ID not found');
        }
        $this->connect->query($sql);
    }
}