<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "zarodolgozat";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
	echo "<a>Failed to connect</a>";
	die;
	
}
