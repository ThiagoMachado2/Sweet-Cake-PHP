<?php
$host = 'localhost';
$usuario = 'root';
$senha = '';
$dbname = 'bolos';

$mysqli = new mysqli($host, $usuario, $senha, $dbname);

if($mysqli->connect_error){
    die("Falha ao conectar ao banco de dados: " . $mysqli->connect_error);
}
?>
