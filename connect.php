<?php
require_once 'config.php';

function connectDB() {
    $conn = new mysqli(HOST, USER, PASSWORD, NAME);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}
