<?php
include('../php/db.php');

if (isset($_POST['idBolo'])) {
    $idBolo = $_POST['idBolo'];

    $query = "DELETE FROM bolos WHERE id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $idBolo);
    $stmt->execute();

    header("Location: ../pages/bolos.php");
    exit();
}

?>
