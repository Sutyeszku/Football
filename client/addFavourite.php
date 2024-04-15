<?php
session_start();
include "db.php";

extract($_POST);
extract($_SESSION);

$sql = "SELECT player_name, kep, player_id FROM favourites WHERE player_id = '{$player_id}' AND user_id = '{$user_id}'";
$stmt = $db->query($sql);
$row = $stmt->fetch();
if (!isset($row['player_id'])) {
    $sql = "INSERT INTO favourites (user_id, player_id, kep, player_name) VALUES ({$user_id}, {$player_id}, '{$photo}','{$player_name}')";

    try {
        $stmt = $db->query($sql);
        echo json_encode(["msg" => "sikeres mentes: {$player_name}"]);
    } catch (Exception $e) {
        echo json_encode(["msg" => "sikertelen mentes:   {$e} {$player_name}"]);
    }
}else{
    echo json_encode(["msg" => "Már elmentetted ezt a játékost!"]);
}

?>