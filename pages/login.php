<?php
session_start();
include('../php/db.php');

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se os campos 'email' e 'password' existem
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $senha = $_POST['password'];

        $query = "SELECT * FROM funcionarios WHERE email = ? AND senha = ?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("ss", $email, $senha);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
          $user = $result->fetch_assoc(); // dados do usuário
          $_SESSION['user_id'] = $user['id']; // id na sessão
          $_SESSION['user_name'] = $user['nome']; // nome do usuário na sessão
          $_SESSION['user_cargo'] = $user['cargo']; // o cargo na sessão
      
          // Redireciona com base no cargo
          if ($user['cargo'] === 'admin' || $user['cargo'] === 'gerente') {
              header("Location: ../pages/dashboard.php");
          } elseif ($user['cargo'] === 'funcionario') {
              header("Location: ../pages/bolos.php");
          } else {
              // Em caso de cargo inesperado, redirecionar para o login com erro
              $error_message = "Cargo inválido.";
              header("Location: ../pages/login.php?error=" . urlencode($error_message));
          }
          exit();
      } else {
          $error_message = "Email ou senha inválidos";
      }
      

        $stmt->close();
    } else {
        $error_message = "Por favor, preencha todos os campos.";
    }
}
$mysqli->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="../style/style-login.css">
</head>
<body>
  <div class="screen-1">
    <form action="login.php" method="POST">
      <img class="logo" src="../images/Sweet+Cake+Logo.png" alt="Sweet Cake Logo">
      <div class="email">
        <label for="email">Email</label>
        <div class="sec-2">
          <input type="email" name="email" placeholder="username@gmail.com" required />
        </div>
      </div>
      <div class="password">
        <label for="password">Password</label>
        <div class="sec-2">
          <input class="pas" type="password" name="password" placeholder="············" required />
        </div>
      </div>
      <button type="submit" class="login">Login</button>
    </form>
    <?php
    if (!empty($error_message)) {
        echo '<p class="error">' . $error_message . '</p>';
    }
    ?>
  </div>
</body>
</html>
