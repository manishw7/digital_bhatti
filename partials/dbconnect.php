<?php
    $server = '127.0.0.1';
    $username = 'root';
    $password = '';

    // Connect to MySQL
    $conn = mysqli_connect($server, $username, $password);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Create Database
    $dbname = "digitalbhatti";
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

    if (!mysqli_query($conn, $sql)) {
        echo "Error creating database: " . mysqli_error($conn);
    }

    // Select the Database
    mysqli_select_db($conn, $dbname);

    // Create Table
    $sqltable = "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL UNIQUE,
        email VARCHAR(100) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        dt DATETIME DEFAULT CURRENT_TIMESTAMP
    );";

    if (!mysqli_query($conn, $sqltable)) {
        echo "Error creating table: " . mysqli_error($conn);
    }
?>
