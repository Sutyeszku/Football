<?php
session_start();
require_once "connection.php";
$sessionName = $_SESSION['user_id'];
$sql = "SELECT `users`.`user_id`, `favourites`.`kep`, `favourites`.`player_name` FROM `users` LEFT JOIN `favourites` ON `favourites`.`user_id` = `users`.`user_id` WHERE `users`.`user_id` = '{$sessionName}'";
$stmt = $con -> query($sql);
echo json_encode($stmt -> fetchAll());
?>