<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn) {
    //echo "connection successfully";

} else {
    echo "failed to connect";
}