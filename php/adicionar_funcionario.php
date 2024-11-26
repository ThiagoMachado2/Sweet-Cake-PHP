<?php
include('../php/db.php'); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nomeFuncionario'];
    $email = $_POST['emailFuncionario']; 
    $cargo = $_POST['cargoFuncionario'];
    $senha = $_POST['senhaFuncionario']; // Recebendo o campo da senha

    if (empty($nome) || empty($email) || empty($cargo) || empty($senha)) { // Verificando se a senha foi preenchida
        $erro = 'Todos os campos são obrigatórios!';
    } else {
        // Inserir os dados no banco
        $sql = "INSERT INTO funcionarios (nome, email, cargo, senha) VALUES (?, ?, ?, ?)";
        $stmt = $mysqli->prepare($sql); // Usando a variável $mysqli para preparar a consulta

        if ($stmt === false) {
            die('Erro ao preparar a consulta: ' . $mysqli->error);
        }

        // Bind dos parâmetros, incluindo a senha
        $stmt->bind_param('ssss', $nome, $email, $cargo, $senha);

        // Executar a consulta
        if ($stmt->execute()) {
            $sucesso = 'Funcionário adicionado com sucesso!';
            // Redirecionar para a página dashboard após o sucesso
            header("Location: ../pages/dashboard.php");
            exit();
        } else {
            $erro = 'Erro ao adicionar funcionário. Tente novamente.';
        }
    }
}
?>

<!-- Exibir mensagens de erro ou sucesso -->
<?php
if (isset($erro)) {
    echo "<p>$erro</p>";
} elseif (isset($sucesso)) {
    echo "<p>$sucesso</p>";
}
?>
