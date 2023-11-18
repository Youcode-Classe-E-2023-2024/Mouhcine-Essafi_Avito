<?php
/**
 * Include Connection File
 */
include('connection.php');
/**
 * Get ID
 */
$id = $_GET["id"];
/**
 * delete a annonce with the given 'id' from the table
 */
$sql = "DELETE FROM $table_name WHERE id = $id";

$res = $conn->query($sql);

if ($res) {
    header("Location: avito.php");
    exit();
} else {
    echo "Erreur lors de l'exécution de la requête !";
}

$conn->close();

?>
