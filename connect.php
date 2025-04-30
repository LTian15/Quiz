<?php

$db_host     = 'localhost';
$db_user     = 'root';
$db_pass     = '';
$db_database = 'asmart_quiz';

// Use the correct variable names
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_database);

// Check if the connection is successful
if (!$conn) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}
?>