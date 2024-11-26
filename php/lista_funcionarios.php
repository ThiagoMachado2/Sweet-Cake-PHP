<?php
include('../php/db.php');

$query = "SELECT * FROM funcionarios";
$result = $mysqli->query($query);

if ($result->num_rows > 0) {
  $funcionarios = $result->fetch_all(MYSQLI_ASSOC); // Armazena todos os funcionários em um array
} else {
  $funcionarios = []; // Caso não haja funcionários, cria um array vazio
}

$mysqli->close(); // Fecha a conexão com o banco
?>