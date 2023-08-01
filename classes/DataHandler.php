<?php
namespace classes;

use DateTime;

require __DIR__ . '/../init.php';

class DataHandler 
{
    public $connect;
    public $main_table;
    public $sub_tables;

    public function __construct($connect, $sub_tables)
    {
        $this->main_table = $GLOBALS['config']['sqlite']['main_table'];
        $this->sub_tables = $sub_tables;
        $this->connect = $connect;
    }

    public function get_datas():array {
        $datas = [];
        foreach($this->sub_tables as $key => $value) {
            $sub_table_data = [];

            $sql_select_elem = "SELECT * FROM $this->main_table WHERE sub_table = '" . $this->sub_tables[$key] . "'";

            $main_result = $this->connect->query($sql_select_elem);

            while($fetch_main_result = $main_result->fetchArray(SQLITE3_ASSOC)) {
                $sub_table_name = array_pop($fetch_main_result);

                $sql_select_in_sub_table = "SELECT * FROM $sub_table_name WHERE id = '" . $fetch_main_result['id'] . "'";

                $fetch_sub_result = $this->connect->query($sql_select_in_sub_table)->fetchArray(SQLITE3_ASSOC);

                if(!$fetch_sub_result) {
                    continue;
                }

                array_push($sub_table_data, $fetch_sub_result);
            }

            $datas[$value] = $sub_table_data;
        }
        return $datas; 
    } 
    
    public function get_column_names():array {
        $sub_talbe_column = [];
    
        $sql_sub_table = "PRAGMA table_info($this->sub_tables)";

        $query_result_sub_table = $this->connect->query($sql_sub_table);

        while($sub_column_names = $query_result_sub_table->fetchArray(SQLITE3_ASSOC)) {
            if($sub_column_names['name'] != 'id') {
                array_push($sub_talbe_column, $sub_column_names['name']);
            }
        }
        return $sub_talbe_column;
    }

    public function add_data() {
        $key_string = 'id, ';
        $values_string = '';
        $sql_insert_main = "INSERT INTO " . $this->main_table . " (sub_table) VALUES ('$this->sub_tables')";
        
        $this->connect->query($sql_insert_main);
        $last_insert_id = $this->connect->lastInsertRowID();

        $values_string .= $last_insert_id . ', ';

        foreach($_POST as $key => $value) {
            $key_string .= trim($key) . ", ";
            $values_string .= "'" . trim($value) . "', ";
        }
        $key_string = trim($key_string, ', ');
        $values_string = trim($values_string, ', ');

        $sql_insert_sub = "INSERT INTO $this->sub_tables ($key_string) VALUES ($values_string)";

        $this->connect->query($sql_insert_sub);
    }

    public function delete_data($id)
    {
        $sql_main_table = "DELETE FROM " . $this->main_table . " WHERE id = '$id'";
        $sql_sub_table = "DELETE FROM $this->sub_tables WHERE id = '$id'";

        $this->connect->query($sql_main_table);
        $this->connect->query($sql_sub_table);
    }

    public function get_one_data($id) {
        $sql = "SELECT * FROM $this->sub_tables WHERE id = '$id'";

        return $this->connect->query($sql)->fetchArray(SQLITE3_ASSOC);
    }


    public function update_data($id) {
        $keys_and_values = "id = $id, ";
     
        foreach ($_POST as $key => $value) {
            $trim_key = trim($key);
            $trim_value = trim($value);
            $str = "$trim_key = " . "'" . trim($trim_value) . "', " ;

            $keys_and_values .= $str;
        }
        $keys_and_values = trim($keys_and_values, ', ');
        $sql = "UPDATE $this->sub_tables SET $keys_and_values WHERE id = '$id'";

        $this->connect->query($sql);
    }

    public function banner_counter($advertisers, $templateData) {
        $date = new DateTime();

        $today = $date->format('d');
        $next_day = $date->add(new \DateInterval('P1D'))->format('d');

        $sql_select_max = "SELECT * FROM `main_banner` WHERE `show_counter` = (SELECT MAX(`show_counter`) FROM main_banner) AND `current_date` = '$today'";

        $result = $this->connect->query($sql_select_max)->fetchArray(SQLITE3_ASSOC);

        if(!$result) {
            $sql_select_all = "SELECT * FROM `main_banner`";
            
            $result = $this->connect->query($sql_select_all);
            while($elem = $result->fetchArray(SQLITE3_ASSOC)) {
                if($elem['current_date'] != $next_day) {
                    $sql_update = "UPDATE `main_banner` SET `current_date` = $today WHERE `id` ='" . $elem['id'] . "'";

                    $this->connect->query($sql_update);
                }
            }
            $result = $this->connect->query($sql_select_max)->fetchArray(SQLITE3_ASSOC);
        }
        if(!$result) {
            foreach($advertisers as $key => $value) {
                $sql_update_all = "UPDATE `main_banner` SET `show_counter` = '" . $advertisers[$key] . "' WHERE `name` = '$key'";
                $this->connect->query($sql_update_all);
            }
            return $templateData;
        } 
        if($result['show_counter'] > 1) {
            $counter = $result['show_counter'] - 1;
            $sql_update_max = "UPDATE `main_banner` SET `show_counter` = '$counter' WHERE `id` ='" . $result['id'] . "'";
            $this->connect->query($sql_update_max);
        }
        elseif ($result['show_counter'] == 1) {
            $counter = $result['show_counter'] - 1;
            $sql_update_max = "UPDATE `main_banner` SET `show_counter` = '$counter', `current_date` = '$next_day' WHERE `id` ='" . $result['id'] . "'";
            $this->connect->query($sql_update_max);
        }
        
        return $result;
    }
}


