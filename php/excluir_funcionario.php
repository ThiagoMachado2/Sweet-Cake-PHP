<?php
include('../php/db.php');

if (isset($_POST['idFuncionario'])) {
    $idFuncionario = $_POST['idFuncionario'];

    $query = "DELETE FROM funcionarios WHERE id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $idFuncionario);
    $stmt->execute();

    header("Location: ../pages/dashboard.php");
    exit();
}
?>
