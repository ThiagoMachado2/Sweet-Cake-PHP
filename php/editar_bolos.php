<?php
include('../php/db.php');

// Verifica se o formulário foi enviado via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém os dados do formulário
    $idBolo = $_POST['idBolo'];
    $nomeBolo = $_POST['nomeBolo'];
    $descricaoBolo = $_POST['descricaoBolo'];
    $precoBolo = $_POST['precoBolo'];
    $categoriaBolo = $_POST['categoriaBolo'];

    // Inicializa a variável para o caminho da imagem
    $imagemDestino = null;

    // Verifica se foi enviado uma nova imagem
    if (isset($_FILES['imagemBolo']) && $_FILES['imagemBolo']['error'] == 0) {
        // Lógica para upload da nova imagem
        $imagemBolo = $_FILES['imagemBolo'];
        $imagemNome = $imagemBolo['name'];
        $imagemTemp = $imagemBolo['tmp_name'];

        // Define o diretório de upload
        $diretorioDestino = '../uploads/bolos/';

        // Verifica se o diretório de upload existe e é gravável
        if (!is_dir($diretorioDestino) || !is_writable($diretorioDestino)) {
            echo "Erro: o diretório de upload não existe ou não é gravável.";
            exit;
        }

        // Define o caminho completo da imagem
        $imagemDestino = $diretorioDestino . basename($imagemNome);

        // Move a imagem para o diretório de upload
        if (move_uploaded_file($imagemTemp, $imagemDestino)) {
            echo "Imagem enviada com sucesso!";
        } else {
            echo "Erro ao mover o arquivo de imagem.";
            exit;
        }
    } else {
        echo "A imagem é obrigatória para atualizar o bolo.";
        exit;
    }

    // Atualizar os dados do bolo no banco de dados
    $sql = "UPDATE bolos SET 
                nome = ?, 
                descricao = ?, 
                preco = ?, 
                categoria = ?, 
                caminho_imagem = ? 
            WHERE id = ?";

    // Preparar a consulta SQL
    if ($stmt = $mysqli->prepare($sql)) {
        // Vincula os parâmetros e executa a consulta
        $stmt->bind_param("sssssi", $nomeBolo, $descricaoBolo, $precoBolo, $categoriaBolo, $imagemDestino, $idBolo);
        $stmt->execute();

        // Verifica se a atualização foi bem-sucedida
        if ($stmt->affected_rows > 0) {
            // Redireciona de volta para a página de bolos após a atualização
            header('Location: ../pages/bolos.php');
            exit; // Interrompe o script após o redirecionamento
        } else {
            echo "Erro ao atualizar o bolo. Nenhuma alteração foi feita.";
        }

        // Fecha a consulta
        $stmt->close();
    } else {
        echo "Erro ao preparar a consulta: " . $mysqli->error;
    }

    // Fechar a conexão com o banco de dados
    $mysqli->close();
} else {
    // Caso o formulário não tenha sido enviado corretamente
    // echo "Método inválido para envio de dados.";
}
