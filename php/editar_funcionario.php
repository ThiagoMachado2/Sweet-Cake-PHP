<?php
include('../php/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recebendo os campos do formulário
    $email_atual = $_POST['emailFuncionarioAntigo']; // O email antigo que está no banco
    $email_novo = $_POST['emailFuncionario']; // O novo email que queremos atualizar
    $nome = $_POST['nomeFuncionario'];
    $cargo = $_POST['cargoFuncionario'];
    $senha = $_POST['senhaFuncionario'];

    // Verifica se todos os campos obrigatórios foram preenchidos
    if (empty($nome) || empty($email_atual) || empty($email_novo) || empty($cargo) || empty($senha)) {
        $erro = 'Todos os campos são obrigatórios!';
    } else {
        // Buscar o id do funcionário pelo email atual (antigo)
        $sql = "SELECT id FROM funcionarios WHERE LOWER(email) = LOWER(?)";
        $stmt = $mysqli->prepare($sql);

        if ($stmt === false) {
            die('Erro ao preparar a consulta: ' . $mysqli->error);
        }

        $stmt->bind_param('s', $email_atual); // Usando o email atual para buscar o id
        $stmt->execute();
        $stmt->store_result();

        // Verifica se o email atual existe no banco de dados
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id);
            $stmt->fetch();

            // Agora que temos o id, podemos atualizar o funcionário com o novo email
            $sql_update = "UPDATE funcionarios SET nome = ?, email = ?, cargo = ?, senha = ? WHERE id = ?";
            $stmt_update = $mysqli->prepare($sql_update);

            if ($stmt_update === false) {
                die('Erro ao preparar a consulta de atualização: ' . $mysqli->error);
            }

            // Atualizando os dados do funcionário
            $stmt_update->bind_param('ssssi', $nome, $email_novo, $cargo, $senha, $id);

            if ($stmt_update->execute()) {
                $sucesso = 'Funcionário atualizado com sucesso!';
                // Redireciona para a página de dashboard após a atualização
                header("Location: ../pages/dashboard.php");
                exit();
            } else {
                $erro = 'Erro ao atualizar funcionário. Tente novamente.';
            }
        } else {
            $erro = 'Funcionário com esse email atual não encontrado.';
        }
    }
}
