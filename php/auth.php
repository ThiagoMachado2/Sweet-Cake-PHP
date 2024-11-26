<?php
include('db.php');

$email = $_POST['email'];
$senha = $_POST['password'];

$query = "SELECT * FROM funcionarios WHERE email = ? AND senha = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("ss", $email, $senha);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Autenticação bem-sucedida
    // Aqui você pode redirecionar para a página principal ou dashboard
    header("Location: dashboard.php");
} else {
    // Erro de autenticação
    $error_message = "Email ou senha inválidos";
}

$stmt->close();
$mysqli->close();
?>
