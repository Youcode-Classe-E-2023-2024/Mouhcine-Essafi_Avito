<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "avito_database";
$table_name = "annonce";


/**
 * Create connection (MySQLi Procedural)
 */
$conn = mysqli_connect($servername, $username, $password);

/**
 * Check connection
 */
if ($conn->connect_error) {
    die("Connection failed: " . mysqli_connect_error());
}

/**
 * SQL query to create a database
 */
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating database: " . $conn->error;
}

/**
 * Select your database
 */
$conn->select_db($dbname);

/**
 * create a table
 */
$sql = "CREATE TABLE IF NOT EXISTS $table_name (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(30) NOT NULL,
    phonenumber VARCHAR(20) NOT NULL,
    title VARCHAR(30) NOT NULL,
    about TEXT NOT NULL,
    price VARCHAR(10) NOT NULL,
    img TEXT NOT NULL
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

?>
