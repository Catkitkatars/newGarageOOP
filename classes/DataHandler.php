<?php

class DataHandler 
{
    public $connect;
    public $table;

    public function __construct($connect, $table)
    {
        $this->table = $table;
        $this->connect = $connect;
    }

    public function getColumnNames($dbName) 
    {
        $columnsNames = [];

        $sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = '$dbName' AND TABLE_NAME = '$this->table'";

        $data = $this->connect->query($sql);

        while ($sqlArray = $data->fetch_assoc()) { 
            array_push($columnsNames, $sqlArray["COLUMN_NAME"]);
        }
        
        if(count($columnsNames) == 0)
        {
            return die("Таблица пустая");
        } 

        return $columnsNames;
    }

    public function getData($dbName) 
    {
        $finishedData = [];
        $sql = "SELECT * FROM `$this->table`";
        $data = $this->connect->query($sql)->fetch_all();
        
        foreach ($data as $key => $values) {
            $arrayCombine = array_combine($this->getColumnNames($dbName), $values);
            array_push($finishedData, $arrayCombine);
        }
        array_push($finishedData, $this->table);
        return $finishedData;
    }

    public function getOneData()
    {
        $id = $_GET['id'];
        $sql = "SELECT * FROM `$this->table` WHERE id = '$id'";

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

        $sql = "INSERT INTO `$this->table` ($keys) VALUES (NULL".','."$values)";

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
        $sql = "UPDATE `$this->table` SET ". $sql ." WHERE `$this->table`.`id` = '$id'";

        $this->connect->query($sql);
    }

    public function deleteData()
    {
        $id = $_GET['id'];
        $sql = "DELETE FROM `$this->table` WHERE `$this->table`.`id` = '$id'";
        if(!$id){
            return die('ID not found');
        }
        $this->connect->query($sql);
    }

    public function bannerCounter($advertisers, $templateData){
        $date = new DateTime();
        $nextDay = $date->add(new DateInterval('P1D'))->format('d');

        $sql= "SELECT * FROM $this->table ORDER BY сurrentDate LIMIT 1";
        $data = $this->connect->query($sql)->fetch_assoc();

        if($data["сurrentDate"] == $nextDay)
        {
            return $templateData;
        } 
        else 
        {
            $showCounter = --$data['show_counter'];
            $sqlEditCounter = "UPDATE `$this->table` SET show_counter = '$showCounter' WHERE id = '{$data['id']}'";
            $this->connect->query($sqlEditCounter);

            if($showCounter == 0){
                foreach($advertisers as $key => $value) {
                    if($key == $data['name']){
                        $showCounter = $value;
                    }
                }
                $sqlEditCurrentDateAndCounter = "UPDATE `$this->table` SET show_counter = '$showCounter', сurrentDate = '$nextDay' WHERE id = '{$data['id']}'";
                $this->connect->query($sqlEditCurrentDateAndCounter);
            }
            return $data;
        }
    }
}


