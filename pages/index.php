<?php
session_start();
include('../php/db.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cake Shop</title>
  <link rel="stylesheet" href="../style/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <!-- bootstrap links -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- bootstrap links -->
  <!-- fonts links -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
  <!-- fonts links -->
</head>

<body>
  <div class="all-content">

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg" id="navbar">
      <div class="container-fluid">
        <a class="navbar-brand" href="#" id="logo"><img src="../images/Sweet+Cake+Logo.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span><i class="fa-solid fa-bars" style="color: white; font-size: 23px;"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Itens centralizados -->
          <div class="mx-auto">
            <ul class="navbar-nav">
              <li class="nav-item"><a class="nav-link active" aria-current="page" href="#home">Home</a></li>
              <li class="nav-item"><a class="nav-link" href="#about">Sobre</a></li>
              <li class="nav-item"><a class="nav-link" href="#menu">Menu</a></li>
              <li class="nav-item"><a class="nav-link" href="#gallary">Galeria</a></li>
              <li class="nav-item"><a class="nav-link" href="#contact">Contato</a></li>
              <li class="nav-item"><a class="nav-link" href="../pages/login.php">Área dos Funcionários</a></li>
            </ul>
          </div>
          <!-- Barra de pesquisa -->
          <form class="d-flex">
            <div class="input-group">
              <input class="form-control" type="search" placeholder="Digite aqui..." aria-label="Search">
              <button class="btn btn-outline-light" type="submit">
                <i class="fa-solid fa-magnifying-glass"></i>
              </button>
            </div>
          </form>
        </div>
      </div>
    </nav>
    <!-- navbar -->

    <!-- home section -->
    <section id="home" class="home">
      <div class="content">
        <h3>Comece o seu dia com um <br> Bolo Fresco</h3>
        <p>Delicie-se com nossos bolos fresquinhos, feitos diariamente com ingredientes selecionados.
          <br>Transforme seus momentos em ocasiões ainda mais especiais!
        </p>
        <button id="btn">Compre agora</button>
      </div>
    </section>

    <!-- home section -->


    <!-- about section -->
    <div class="about" id="about">
      <div class="container">
        <div class="heading">Sobre <span>Nós</span></div>
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <img src="../images/o-bolo-de-chocolate-mais-apetitoso-em-fundo-escuro-gerar-ai_868783-1440.avif" alt="">
            </div>
          </div>
          <div class="col-md-6">
            <h3>O que torna nosso bolo especial?</h3>
            <p>Nossos bolos são feitos com ingredientes de alta qualidade e uma pitada de amor, garantindo sabor e textura únicos em cada fatia.
              <br><br>Personalizamos cada bolo de acordo com o seu desejo, desde o sabor até a decoração, para tornar cada celebração especial e inesquecível.
              <br><br>Com anos de experiência, nossa equipe dedica-se a criar bolos que não são apenas deliciosos, mas também verdadeiras obras de arte. Venha descobrir o que torna nossos bolos tão especiais!
            </p>
            <button id="about-btn">Learn More.</button>
          </div>
        </div>
      </div>
    </div>
    <!-- about section -->


    <!-- top cards -->
    <section class="top-cards">
      <div class="heading2">Top <span>Categorias</span></div>
      <div class="container">
        <div class="row">
          <div class="col-md-4 py-3 py-md-0">
            <div class="card">
              <img src="../images/26516137-delicioso-chocolate-bolo-sombrio-fundo-com-esvaziar-espaco-para-texto-gratis-foto.jpg" alt="">

            </div>
          </div>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card">
              <img src="../images/victoria-sanduiche-2.webp" alt="">

            </div>
          </div>
          <div class="col-md-4 py-3 py-md-0">
            <div class="card">
              <img src="../images/3-bolos-caseiros-incriveis-e-faceis-de-preparar.jpg" alt="">

            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- top cards -->


    <!-- menu -->
    <section class="menu" id="menu">
      <div class="container">
        <div class="heading3">Menu</div>
      </div>
      <div class="container" id="container2">
        <div class="row">
          <?php
          // Consulta SQL para buscar os bolos
          $sql = "SELECT caminho_imagem, nome, preco FROM bolos";
          $result = $mysqli->query($sql);

          if ($result->num_rows > 0) {
            // Exibir os dados dos bolos
            while ($row = $result->fetch_assoc()) {
              echo '
              <div class="col-md-3 py-3 py-md-0">
                <div class="card">
                  <img src="' . $row['caminho_imagem'] . '" alt="' . $row['nome'] . '">
                  <div class="card-body">
                    <div class="star text-center">
                      <i class="fa-regular fa-star"></i>
                      <i class="fa-regular fa-star"></i>
                      <i class="fa-regular fa-star"></i>
                      <i class="fa-regular fa-star"></i>
                      <i class="fa-regular fa-star"></i>
                    </div>
                    <h3>' . htmlspecialchars($row['nome']) . '</h3>
                    <p>R$ ' . number_format($row['preco'], 2, ',', '.') . ' <span><i class="fa-solid fa-cart-shopping"></i></span></p>
                  </div>
                </div>
              </div>';
            }
          } else {
            echo '<p class="text-center">Nenhum bolo encontrado.</p>';
          }
          ?>
        </div>
      </div>
    </section>
    <!-- menu -->


    <!-- our gallary -->
    <div class="container" id="gallary">
      <h1 class="heading5">Nossa <span>Galeria</span></h1>
      <div class="row" style="margin-top: 30px;">
        <div class="col-md-4 py-3 py-md-0">
          <div class="card">
            <img src="../images/istockphoto-826241986-612x612.jpg" alt="">
          </div>
        </div>
        <div class="col-md-4 py-3 py-md-0">
          <div class="card">
            <img src="../images/360_F_585866610_tvnOXqSmAyPKKlw3p00sAHsSymlXoWmb.jpg" alt="">
          </div>
        </div>
        <div class="col-md-4 py-3 py-md-0">
          <div class="card">
            <img src="../images/confeitaria-Jata_capa.jpeg" alt="">
          </div>
        </div>
      </div>
      <div class="row" style="margin-top: 30px;">
        <div class="col-md-4 py-3 py-md-0">
          <div class="card">
            <img src="../images/vitrine-de-vidro-de-pastelaria-com-variedade-de-bolos-e-doces-frescos-sobremesas-doces-populares-oferecidas-para-venda_639032-1341.avif" alt="">
          </div>
        </div>
        <div class="col-md-4 py-3 py-md-0">
          <div class="card">
            <img src="../images/360_F_462930299_rVQ9GeiLXpDBxsIkycqPlPFEC53CJElD.jpg" alt="">
          </div>
        </div>
        <div class="col-md-4 py-3 py-md-0">
          <div class="card">
            <img src="../images/victoria-sanduiche-2.webp" alt="">
          </div>
        </div>
      </div>
    </div>
    <!-- our gallary -->


    <!-- contact -->
    <section class="contact" id="contact">

      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <div class="heading6">Contate <span>Nós</span></div>

            <p>Entre em contato conosco para encomendar o bolo perfeito para sua festa!
              <br>Estamos prontos para atender suas dúvidas e personalizar sua experiência
            </p>

            <input class="form-control" type="text" placeholder="Nome" aria-label="default input example"><br>
            <input class="form-control" type="email" placeholder="Email" aria-label="default input example"><br>
            <input class="form-control" type="number" placeholder="Número" aria-label="default input example"><br>
            <button id="contact-btn">Enviar Mensagem</button>
          </div>
          <div class="col-md-5" id="col">
            <h1>Info</h1>
            <p><i class="fa-regular fa-envelope"></i> example@gmail.com</p>
            <p><i class="fa-solid fa-phone"></i> +55 (75) 3000-0000</p>
            <p><i class="fa-solid fa-building-columns"></i> Av. Getúlio Vargas, Feira de Santana, Bahia, Brasil</p>
            <p>Oferecemos bolos de aniversário personalizados e deliciosos para tornar sua celebração inesquecível! Escolha entre diversos sabores, tamanhos e decorações.</p>
          </div>
        </div>
      </div>

    </section>
    <!-- contact -->


    <!-- footer -->
    <footer id="footer">
      <div class="footer-logo text-center"><img src="../images/Sweet+Cake+Logo.png" alt=""></div>
      <div class="social-links text-center">
        <i class="fa-brands fa-twitter"></i>
        <i class="fa-brands fa-facebook-f"></i>
        <i class="fa-brands fa-instagram"></i>
        <i class="fa-brands fa-youtube"></i>
        <i class="fa-brands fa-pinterest-p"></i>
      </div>
      <div class="credits text-center">
        <a href="#"></a>
      </div>
      <div class="copyright text-center">
        &copy; Copyright <strong><span>Sweet Cake</span></strong>. All Rights Reserved
      </div>
    </footer>
    <!-- footer -->

    <a href="#" class="arrow"><i><img src="../images/up-arrow.png" alt="" width="50px"></i></a>


  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>