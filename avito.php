<?php
    include "connection.php";
/**
 * Retrieve Data from the Database
 */
$sql = "SELECT * FROM $table_name";
$result = $conn->query($sql);
?>