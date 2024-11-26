<?php
include('../php/db.php'); // Inclui o arquivo de conexão com o banco

// Consulta para obter todos os bolos da tabela "bolos"
$query = "SELECT * FROM bolos";
$result = $mysqli->query($query);

if ($result->num_rows > 0) {
    $bolos = $result->fetch_all(MYSQLI_ASSOC); // Armazena todos os bolos em um array
} else {
    $bolos = []; // Caso não haja bolos, cria um array vazio
}

$mysqli->close(); // Fecha a conexão com o banco
?>
