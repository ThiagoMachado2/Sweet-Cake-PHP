<?php
include('../php/db.php');
session_start();

// Verifica se o usuário está autenticado
if (!isset($_SESSION['user_id'])) {
    header("Location: ../pages/login.php");
    exit();
}

$user_name = $_SESSION['user_name'];
$user_cargo = $_SESSION['user_cargo'];


include('../php/listar_bolos.php');
include('../php/adicionar_bolos.php');
include('../php/editar_bolos.php');
include('../php/excluir_bolos.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../style/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../style/img/favicon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>
        Dashboard Bolos
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
    <!-- Nucleo Icons -->
    <link href="../style/nucleo-icons.css" rel="stylesheet" />
    <link href="../style/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
    <!-- CSS Files -->
    <link id="pagestyle" href="../style/material-dashboard.css?v=3.2.0" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-100">
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2  bg-white my-2" id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand px-4 py-3 m-0" href="#" target="_blank">
                <img src="../images/Sweet+Cake+Logo.png" class="navbar-brand-img" width="26" height="26" alt="main_logo">
                <span class="ms-1 text-sm text-dark">Sweet Cake</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active text-dark" href="../pages/dashboard.php">
                        <i class="material-symbols-rounded opacity-5">home</i>
                        <span class="nav-link-text ms-1">Home</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark active bg-gradient-dark text-white" href="../pages/bolos.php">
                        <i class="material-symbols-rounded opacity-5">cake</i>
                        <span class="nav-link-text ms-1">Bolos</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="../pages/index.php">
                        <i class="material-symbols-rounded opacity-5">list</i>
                        <span class="nav-link-text ms-1">Catalago</span>
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-dark font-weight-bolder opacity-5">Sair</h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="../php/logout.php">
                        <i class="material-symbols-rounded opacity-5">logout</i>
                        <span class="nav-link-text ms-1">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="sidenav-footer position-absolute w-100 bottom-0 ">
        </div>
    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Cadastro</li>
                    </ol>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    </div>
                    <ul class="navbar-nav d-flex align-items-center  justify-content-end">
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item px-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0">
                                <i class="material-symbols-rounded fixed-plugin-button-nav">settings</i>
                            </a>
                        </li>
                        <li class="nav-item dropdown pe-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="material-symbols-rounded">notifications</i>
                            </a>
                        </li>
                        <li class="nav-item d-flex align-items-center">
                            <a href="" class="nav-link text-body font-weight-bold px-0">
                                <i class="material-symbols-rounded">account_circle</i>
                                <span><?php echo htmlspecialchars($user_name); ?></span> <!-- Exibe o nome do usuário -->
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-2">
            <div class="row">
                <div class="ms-3">
                    <h3 class="mb-0 h4 font-weight-bolder">Funcionarios</h3>
                    <p class="mb-4">
                        Gerenciamento de Funcionarios.
                    </p>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            </div>
            <div class="col-xl-3 col-sm-6">
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-lg-6 col-7">
                                <h6>Cadastro de Bolos</h6>
                                <p class="text-sm mb-0">
                                    <i class="fa fa-cake text-info" aria-hidden="true"></i> Gerencie os bolos da loja
                                </p>
                            </div>
                            <div class="col-lg-6 col-5 my-auto text-end">
                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addBoloModal">
                                    Adicionar Bolo
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <!-- Tabela de Bolos -->
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th> <!-- Nova coluna ID -->
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nome</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Descrição</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Imagem</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Preço</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Categoria</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($bolos)) : ?>
                                        <?php foreach ($bolos as $bolo) : ?>
                                            <tr>
                                                <td class="text-center"> <?php echo htmlspecialchars($bolo['id']); ?> </td> <!-- Exibe o ID do Bolo -->
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm"><?php echo htmlspecialchars($bolo['nome']); ?></h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0"><?php echo htmlspecialchars($bolo['descricao']); ?></p>
                                                </td>
                                                <td>
                                                    <img src="<?php echo htmlspecialchars($bolo['caminho_imagem']); ?>" alt="Imagem do Bolo" class="img-fluid" style="max-width: 100px;">
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="badge badge-sm bg-gradient-success"><?php echo 'R$ ' . number_format($bolo['preco'], 2, ',', '.'); ?></span>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="badge badge-sm bg-gradient-info"><?php echo htmlspecialchars($bolo['categoria']); ?></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editBoloModal"
                                                        data-id="<?php echo $bolo['id']; ?>"
                                                        data-nome="<?php echo htmlspecialchars($bolo['nome']); ?>"
                                                        data-descricao="<?php echo htmlspecialchars($bolo['descricao']); ?>"
                                                        data-preco="<?php echo number_format($bolo['preco'], 2, ',', '.'); ?>"
                                                        data-categoria="<?php echo htmlspecialchars($bolo['categoria']); ?>">
                                                        Editar
                                                    </button>
                                                    <form action="../php/excluir_bolos.php" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir?');">
                                                        <input type="hidden" name="idBolo" value="<?php echo $bolo['id']; ?>">
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            Excluir
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="7" class="text-center">Nenhum bolo cadastrado.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Modal para Adicionar Bolo -->
                <div class="modal fade" id="addBoloModal" tabindex="-1" aria-labelledby="addBoloModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addBoloModalLabel">Adicionar Bolo</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Formulário para adicionar bolo -->
                                <form id="formAdicionarBolo" method="POST" action="../php/adicionar_bolos.php" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="nomeBolo" class="form-label">Nome</label>
                                        <input type="text" class="form-control" id="nomeBolo" name="nomeBolo" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="descricaoBolo" class="form-label">Descrição</label>
                                        <textarea class="form-control" id="descricaoBolo" name="descricaoBolo" rows="3" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="precoBolo" class="form-label">Preço</label>
                                        <input type="number" step="0.01" class="form-control" id="precoBolo" name="precoBolo" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="categoriaBolo" class="form-label">Categoria</label>
                                        <input type="text" class="form-control" id="categoriaBolo" name="categoriaBolo" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="imagemBolo" class="form-label">Imagem</label>
                                        <input type="file" class="form-control" id="imagemBolo" name="imagemBolo" accept="image/*" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal para Editar Bolo -->
                <div class="modal fade" id="editBoloModal" tabindex="-1" aria-labelledby="editBoloModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editBoloModalLabel">Editar Bolo</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="formEditarBolo" method="POST" action="../php/editar_bolos.php" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="editIdBolo" class="form-label">ID</label>
                                        <input type="text" class="form-control" id="editIdBolo" name="idBolo" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editNomeBolo" class="form-label">Nome</label>
                                        <input type="text" class="form-control" id="editNomeBolo" name="nomeBolo" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editDescricaoBolo" class="form-label">Descrição</label>
                                        <textarea class="form-control" id="editDescricaoBolo" name="descricaoBolo" rows="3" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editPrecoBolo" class="form-label">Preço</label>
                                        <input type="number" step="0.01" class="form-control" id="editPrecoBolo" name="precoBolo" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editCategoriaBolo" class="form-label">Categoria</label>
                                        <input type="text" class="form-control" id="editCategoriaBolo" name="categoriaBolo" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="editImagemBolo" class="form-label">Imagem</label>
                                        <input type="file" class="form-control" id="editImagemBolo" name="imagemBolo" accept="image/*" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <script>
                    // Preenche os campos do modal de edição com os dados do bolo selecionado
                    const editBoloModal = document.getElementById('editBoloModal');
                    editBoloModal.addEventListener('show.bs.modal', function(event) {
                        // Obtém os dados do bolo a partir do botão de editar
                        const button = event.relatedTarget;
                        const boloId = button.getAttribute('data-id');
                        const boloNome = button.getAttribute('data-nome');
                        const boloDescricao = button.getAttribute('data-descricao');
                        const boloPreco = button.getAttribute('data-preco');
                        const boloCategoria = button.getAttribute('data-categoria');
                        const boloImagem = button.getAttribute('data-imagem');

                        // Preenche os campos do modal com os dados do bolo
                        document.getElementById('editIdBolo').value = boloId;
                        document.getElementById('editNomeBolo').value = boloNome;
                        document.getElementById('editDescricaoBolo').value = boloDescricao;
                        document.getElementById('editPrecoBolo').value = boloPreco;
                        document.getElementById('editCategoriaBolo').value = boloCategoria;
                        if (boloImagem) {
                            // Exibe a imagem atual (se houver)
                            document.getElementById('editImagemBolo').setAttribute('data-imagem-atual', boloImagem);
                        }
                    });
                </script>



            </div>
        </div>

        </div>
    </main>
    <?php include "js.php"; ?>
</body>

</html>