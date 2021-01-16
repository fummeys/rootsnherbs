<?php
// // dbconfiguration online
// $servername = "";
// $username = "";
// $password = "";
// $dbname ="";

//request uri
    $uri = $_SERVER["REQUEST_URI"];

// dbconfiguration offline
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname ="castle";
// dbconnection
$conn = new mysqli($servername, $username, $password, $dbname);