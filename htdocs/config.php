<?php

$server = "localhost";
$user = "root";
$pass = "";
$database = "db";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {

    echo "<script>alert('Connection failed!')</script>";

}

?>
