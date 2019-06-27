<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password);


if (!$conn) {
    die("Connection failed: ");
}
//echo "Connected successfully";
mysqli_select_db($conn,"commodity_dataset");
//echo "connected";
//mysqli_close($conn);
?>
