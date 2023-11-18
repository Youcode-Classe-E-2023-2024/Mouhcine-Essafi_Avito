<?php

include('connection.php');
$id = $_GET["id"];

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
