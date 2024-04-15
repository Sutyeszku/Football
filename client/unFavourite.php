<?php
session_start();
include "db.php";

extract($_GET);
extract($_SESSION);

    $sql = "DELETE FROM favourites WHERE player_id = '{$player_id}' AND user_id = '{$user_id}'";

    try {
        $stmt = $db->query($sql);
        echo json_encode(["msg" => "sikeres tölés:  {$player_id}"]);
    } catch (Exception $e) {
        echo json_encode(["msg" => "sikertelen törlés! {$player_id}"]);
    }

?>