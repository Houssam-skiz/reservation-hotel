<?php  
$host = "localhost";
$users = "root";
$pass = "";
$db = "hotel1";
$conn = mysqli_connect($host, $users, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>