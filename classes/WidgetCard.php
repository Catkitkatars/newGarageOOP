<?php 
namespace classes;

use SQLite3;

class WidgetCard
{
    private $data;
    private $connect;

    public function __construct($connect, $data)
    {
        $this->data = $data;
        $this->connect = $connect;
    }


    private function info_like_dislike_active($id, $user_id) {
        $id = $this->connect->escapeString($id);
        $user_id = $this->connect->escapeString($user_id);

        $find_his_like = "SELECT * FROM like_dislike WHERE id = '$id' AND user_id = '$user_id'";

        $data = $this->connect->query($find_his_like)->fetchArray(SQLITE3_ASSOC);

        if($data) {
            return $data['like_dislike'];
        }
        else 
        {
            return 0;
        }

    }
    private function info_likes_dislikes($id) {
        $result = 0;
        $id = $this->connect->escapeString($id);
        $sql_select_one = "SELECT * FROM like_dislike WHERE id = '$id'";

        $data = $this->connect->query($sql_select_one);

        while($row = $data->fetchArray(SQLITE3_ASSOC)) {
            $result += $row["like_dislike"];
        }

        if($result < 0) {
            return 0;
        }

        return $result;
    }

    public function render($login) : string
    {
        if($login) {
            $cards_block = '';
          
            foreach($this->data as $data_key => $data_value) {
                $cards_html = '';
            
                foreach($this->data[$data_key] as $key => $value) {
                    $like_or_dislike_or_nothing = $this->info_like_dislike_active($this->data[$data_key][$key]['id'], $login);
                    $likes_counter = $this->info_likes_dislikes($this->data[$data_key][$key]['id']);

                    $cards_html .= ob_include(__DIR__ . '/../templates/render_cards.phtml', 
                    ['data' => $this->data[$data_key][$key], 'sub_table_name' => $data_key , 'likes' => $likes_counter, 'like_active' => $like_or_dislike_or_nothing]);
                }
                $cards_block .= ob_include(__DIR__ . '/../templates/cards_block.phtml', ['table_name' => $data_key, 'html' => $cards_html]);
            } 
            return $cards_block;
        }
        else 
        {
            $cards_block = '';

            foreach($this->data as $data_key => $data_value) {
                $cards_html = '';
                foreach($this->data[$data_key] as $key => $value) {
                    
                    $likes_counter = $this->info_likes_dislikes($this->data[$data_key][$key]['id']);

                    $cards_html .= ob_include(__DIR__ . '/../templates/render_cards_no_login.phtml', 
                    ['data' => $this->data[$data_key][$key], 'sub_table_name' => $data_key, 'likes' => $likes_counter]);
                }
                $cards_block .= ob_include(__DIR__ . '/../templates/cards_block_no_login.phtml', ['table_name' => $data_key, 'html' => $cards_html]);
            }
            return $cards_block;
        }
    } 
}