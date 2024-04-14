<?php
session_start();
include "connection.php";

extract($_POST);
extract($_SESSION);
$user_id = $_SESSION['user_id'];
$sql = "INSERT INTO favourites (user_id, player_id, kep, player_name) VALUES ({$user_id}, {$player_id}, '{$photo}','{$player_name}')";

try {
    $stmt = $con->query($sql);
    echo json_encode(["msg" => "sikeres mentes: {$player_name}"]);
} catch (Exception $e) {
    echo json_encode(["msg" => "sikertelen mentes:   {$e} {$player_name}"]);
}

?>