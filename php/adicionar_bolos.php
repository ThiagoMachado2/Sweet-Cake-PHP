<?php
include('../php/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nomeBolo = $_POST['nomeBolo'];
    $precoBolo = $_POST['precoBolo'];
    $descricaoBolo = $_POST['descricaoBolo'];
    $categoriaBolo = $_POST['categoriaBolo'];
    $imagemBolo = $_FILES['imagemBolo']; // Recebendo o arquivo de imagem

    // Verifica se todos os campos foram preenchidos
    if (empty($nomeBolo) || empty($precoBolo) || empty($descricaoBolo) || empty($categoriaBolo) || empty($imagemBolo['name'])) {
        $erro = 'Todos os campos, incluindo a imagem, são obrigatórios!';
    } else {
        // Pasta para salvar as imagens
        $diretorioImagens = '../uploads/bolos/';
        if (!is_dir($diretorioImagens)) {
            mkdir($diretorioImagens, 0777, true); // Cria a pasta se não existir
        }

        // Gerar um nome único para a imagem
        $extensao = pathinfo($imagemBolo['name'], PATHINFO_EXTENSION);
        $nomeImagem = uniqid('bolo_') . '.' . $extensao;
        $caminhoImagem = $diretorioImagens . $nomeImagem;

        // Verifica se o arquivo é uma imagem válida
        $detalhesImagem = getimagesize($imagemBolo['tmp_name']);
        if ($detalhesImagem === false) {
            $erro = 'O arquivo enviado não é uma imagem válida!';
        } else {
            // Tipo MIME da imagem
            $tipoImagem = $detalhesImagem['mime']; // 'image/jpeg', 'image/png', etc.

            // Verifica a extensão do arquivo e o tipo MIME
            $extensoesPermitidas = ['jpg', 'jpeg', 'png', 'gif'];
            $tiposPermitidos = ['image/jpeg', 'image/png', 'image/gif'];

            // Verifica a extensão e o tipo MIME
            if (!in_array($extensao, $extensoesPermitidas) || !in_array($tipoImagem, $tiposPermitidos)) {
                $erro = 'Apenas imagens JPEG, PNG e GIF são permitidas!';
            } else {
                // Verifica o tamanho do arquivo (máximo de 2MB)
                if ($imagemBolo['size'] > 2 * 1024 * 1024) {
                    $erro = 'O arquivo é muito grande. O tamanho máximo permitido é 2MB.';
                } else {
                    // Move a imagem para o diretório
                    if (move_uploaded_file($imagemBolo['tmp_name'], $caminhoImagem)) {
                        // Insere os dados no banco, incluindo o caminho da imagem
                        $sql = "INSERT INTO bolos (nome, preco, descricao, categoria, caminho_imagem) VALUES (?, ?, ?, ?, ?)";
                        $stmt = $mysqli->prepare($sql);

                        if ($stmt === false) {
                            die('Erro ao preparar a consulta: ' . $mysqli->error);
                        }

                        // Bind dos parâmetros
                        $stmt->bind_param('sdsss', $nomeBolo, $precoBolo, $descricaoBolo, $categoriaBolo, $caminhoImagem);

                        // Executa a consulta
                        if ($stmt->execute()) {
                            $sucesso = 'Bolo adicionado com sucesso!';
                            // Redireciona para a página de listagem de bolos após o sucesso
                            header("Location: ../pages/bolos.php");
                            exit();
                        } else {
                            $erro = 'Erro ao adicionar o bolo. Tente novamente.';
                        }
                    } else {
                        $erro = 'Erro ao fazer o upload da imagem.';
                    }
                }
            }
        }
    }
}
?>
