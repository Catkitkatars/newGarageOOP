<?php
session_start();

if(!isset($_SESSION['login'])) {
    header('location: /');
}

$db = new SQLite3('../database/sqlite_database.db');

if(!empty($_POST['id']) && !empty($_POST['like_dislike'])) {
    $user_id = $_SESSION['login'];
    $elem_id = $db->escapeString($_POST['id']);
    $like_dislike = $db->escapeString($_POST['like_dislike']);
    $response = array('status' => 'error');


    $sql_delete = "DELETE FROM like_dislike WHERE user_id = '$user_id' AND id = '$elem_id' AND like_dislike = '$like_dislike'";

    $sql_select = "SELECT * FROM like_dislike WHERE id = '$elem_id' AND user_id = '$user_id' AND like_dislike = '$like_dislike'";

    $sql_insert = "INSERT INTO like_dislike (id, user_id, like_dislike) VALUES ('$elem_id', '$user_id', '$like_dislike')";

    $check = $db->query($sql_select)->fetchArray(SQLITE3_ASSOC);

    if($elem_id) {
        if(!$check) {
            $db->query($sql_insert);
            $response = array('status' => 'success');
        }
        else
        {
            $db->query($sql_delete);
            $response = array('status' => 'success');
        }
    }
}
header('Content-Type: application/json');
echo json_encode($response);
