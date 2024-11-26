<?php
include('../php/db.php');
session_start(); // Inicia a sessão

// Verifica se o usuário está autenticado
if ($_SESSION['user_cargo'] !== 'admin' && $_SESSION['user_cargo'] !== 'gerente') {
  header("Location: ../pages/bolos.php"); // Redireciona para bolos.php se não for admin ou gerente
  exit();
}


// Obtém informações do usuário a partir da sessão
$user_name = $_SESSION['user_name'];
$user_cargo = $_SESSION['user_cargo'];


// Obtém o nome do usuário
$user_name = $_SESSION['user_name'];

include('../php/lista_funcionarios.php');
include('../php/adicionar_funcionario.php');
include('../php/editar_funcionario.php');
include('../php/excluir_funcionario.php');
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
    Dashboard Funcionarios
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
          <a class="nav-link active bg-gradient-dark text-white" href="../pages/dashboard.php">
            <i class="material-symbols-rounded opacity-5">home</i>
            <span class="nav-link-text ms-1">Home</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="../pages/bolos.php">
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
                <h6>Cadastro de Funcionários</h6>
                <p class="text-sm mb-0">
                  <i class="fa fa-check text-info" aria-hidden="true"></i> Gerencie os funcionários da loja
                </p>
              </div>
              <div class="col-lg-6 col-5 my-auto text-end">
                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addFuncionarioModal">
                  Adicionar Funcionário
                </button>
              </div>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <!-- Tabela de Funcionários -->
            <div class="table-responsive">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nome</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Cargo</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ações</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($funcionarios as $funcionario): ?>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?php echo htmlspecialchars($funcionario['nome']); ?></h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-sm font-weight-bold mb-0"><?php echo htmlspecialchars($funcionario['email']); ?></p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success"><?php echo htmlspecialchars($funcionario['cargo']); ?></span>
                      </td>
                      <td class="align-middle text-center">
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editFuncionarioModal">
                          Editar
                        </button>
                        <form action="../php/excluir_funcionario.php" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir?');">
                          <input type="hidden" name="idFuncionario" value="<?php echo $funcionario['id']; ?>">
                          <button type="submit" class="btn btn-danger btn-sm">
                            Excluir
                          </button>
                        </form>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- Modal para Adicionar Funcionário -->
        <div class="modal fade" id="addFuncionarioModal" tabindex="-1" aria-labelledby="addFuncionarioModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="addFuncionarioModalLabel">Adicionar Funcionário</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="../php/adicionar_funcionario.php" method="POST">
                  <div class="mb-3">
                    <label for="nomeFuncionario" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nomeFuncionario" name="nomeFuncionario" required>
                  </div>
                  <div class="mb-3">
                    <label for="emailFuncionario" class="form-label">Email</label>
                    <input type="email" class="form-control" id="emailFuncionario" name="emailFuncionario" required>
                  </div>
                  <div class="mb-3">
                    <label for="cargoFuncionario" class="form-label">Cargo</label>
                    <select class="form-control" id="cargoFuncionario" name="cargoFuncionario">
                      <option value="admin">Admin</option>
                      <option value="gerente">Gerente</option>
                      <option value="funcionario">Funcionário</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="senhaFuncionario" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="senhaFuncionario" name="senhaFuncionario" required>
                  </div>
                  <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal para Editar Funcionário -->
        <div class="modal fade" id="editFuncionarioModal" tabindex="-1" aria-labelledby="editFuncionarioModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="editFuncionarioModalLabel">Editar Funcionário</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="../php/editar_funcionario.php" method="POST">
                  <input type="hidden" id="editFuncionarioId" name="id">
                  <div class="mb-3">
                    <label for="editNomeFuncionario" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="editNomeFuncionario" name="nomeFuncionario" required>
                  </div>
                  <!-- Campo Email Antigo (editável) -->
                  <div class="mb-3">
                    <label for="editEmailFuncionario" class="form-label">Email Antigo</label>
                    <input type="email" class="form-control" id="editEmailFuncionario" name="emailFuncionarioAntigo" required>
                  </div>
                  <!-- Campo Email Novo -->
                  <div class="mb-3">
                    <label for="editNovoEmailFuncionario" class="form-label">Novo Email</label>
                    <input type="email" class="form-control" id="editNovoEmailFuncionario" name="emailFuncionario" required>
                  </div>
                  <div class="mb-3">
                    <label for="editCargoFuncionario" class="form-label">Cargo</label>
                    <select class="form-control" id="editCargoFuncionario" name="cargoFuncionario">
                      <option value="admin">Admin</option>
                      <option value="gerente">Gerente</option>
                      <option value="funcionario">Funcionário</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="editSenhaFuncionario" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="editSenhaFuncionario" name="senhaFuncionario">
                  </div>
                  <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </main>
  <?php include "js.php"; ?>
</body>

</html>