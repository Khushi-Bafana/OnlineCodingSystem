<?php

    $dbDetails = parse_ini_file("dbData.ini");

    $db_name = $dbDetails['db_name'];
    $user_name = $dbDetails['user_name'];
    $db_password = $dbDetails['password'];
    $host = $dbDetails['server_name'];

    $conn = mysqli_connect($host, $user_name, $db_password, $db_name);
    if ($conn->connect_error) {
        die("Connection failed: ".$conn->connect_error);
    }
    
?>
