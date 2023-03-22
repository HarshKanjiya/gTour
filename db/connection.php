<?php
$s_name = "localhost";
$u_name = "root";
$p = "";
$db_name = "gtour";


$connection = new mysqli($s_name, $u_name, $p, $db_name);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

?>