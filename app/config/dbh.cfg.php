<?php
    $ServerName = "127.0.0.1";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "quiz";

    $conn = mysqli_connect($ServerName, $dbUsername, $dbPassword, $dbName);
    
    if(!$conn)
    {
        die("MySQL ERROR : ".mysqli_connect_error());
    }