<?php
session_start();

// Incluir a conexão com o banco de dados
include('conexao.php');

$subtotal = 0;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site Petshop PetCare</title>
    <link rel="stylesheet" href="css/homepage.css?v=<?php echo filemtime('css/homepage.css'); ?>">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.1/css/boxicons.min.css">
    
</head>
<body>
    <div class="promo-banner">
        <i class='bx bxs-gift'></i>
        <span>Frete grátis na primeira compra</span>
    </div>
    <nav class="navbar">
    <div class="navbar-container">
        <img src="logo/logovertical.png" alt="Logo" class="logo">
        <div class="search-container">
            <input type="text" placeholder="Pesquisar...">
            <button type="submit"><i class='bx bx-search'></i></button>
        </div>
        <div class="nav-links">
            <a href="index.php"><i class='bx bxs-home'></i></a>
            <a href="cadastro.php"><i class='bx bxs-user'></i></a>
            <a href="favoritos.php"><i class='bx bxs-heart'></i></a>
             <a class="cart-link"><i class='bx bxs-cart'></i><div class="cart-count">0</div></a>
        </div>

        <?php if (isset($_SESSION['email_usuario'])): ?>
    <!-- Exibe o e-mail do usuário -->
    <div class="user-info">
        <span class="email-usuario">
            <?= htmlspecialchars($_SESSION['email_usuario']); ?>
        </span>
    </div>
    <!-- Passa o e-mail do usuário para o JavaScript -->
    <script>
        var usuarioLogado = "<?= $_SESSION['email_usuario']; ?>";
    </script>
    <div><a href="logout.php" class="logout-btn">Encerrar Sessão</a></div>
<?php else: ?>
    <span class="login-message">
        Faça login para acessar o carrinho
    </span>
<?php endif; ?>
    </div>
</nav>

 <!-- Carrinho dropdown -->
<div class="cart-dropdown">
    <div class="cart-items">
        <!-- Sem produtos inicialmente -->
    </div>

    <div class="cart-subtotal">
        <p>Subtotal do carrinho:</p>
        <p><strong>R$ <?= number_format($subtotal, 2, ',', '.') ?></strong></p>
    </div>

    <button class="finalizar-compra">Finalizar compra</button>
</div>
        </div>
    </header>

    <nav class="secondary-navbar">
        <div class="secondary-navbar-container">
            <a href="#produtos">Produtos</a>
            <a href="#servicos">Serviços</a>
            <a href="#promocoes">Promoções</a>
        </div>
    </nav>
    <br>
    
    <div class="slideshow-container">

    <div class="Slides fade">
      <div class="numbertext">1 / 4</div>
      <img src="images/1.png" style="width:100%">
    </div>
  
    <div class="Slides fade">
      <div class="numbertext">2 / 4</div>
      <img src="images/2.png" style="width:100%">
    </div>
  
    <div class="Slides fade">
      <div class="numbertext">3 / 4</div>
      <img src="images/3.png" style="width:100%">
    </div>

    <div class="Slides fade">
        <div class="numbertext">4 / 4</div>
        <img src="images/4.png" style="width:100%">
      </div>
  
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
  </div>
  <br>
  
  <div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
    <span class="dot" onclick="currentSlide(4)"></span>
  </div>

<main id="produtos">
  <div class="container">
    <div class="card">
        <div class="rating"><i class='bx bxs-star' style='color:#feec00'></i> 5.0</div>
        <img src="images/racaoumida.png" alt="Produto 1">
        <h5>Ração Úmida Pet Delícia Natural Maravilha de Frango para Gatos</h5>
        <p>320 g</p>
        <span>R$ 20,69</span>
        <button class="add-to-cart" data-id="1" data-price="20.69">Comprar</button>
    </div>
    <div class="card">
        <div class="rating"><i class='bx bxs-star' style='color:#feec00'></i> 5.0</div>
        <img src="images/areia.png" alt="Produto 2">
        <h5>Areia Sanitária Mineral Meau Super Seca para Gatos</h5>
        <p>4 Kg</p>
        <span>R$ 43,12</span>
        <button class="add-to-cart" data-id="2" data-price="43.12">Comprar</button>
    </div>
    <div class="card">
        <div class="rating"><i class='bx bxs-star' style='color:#feec00'></i> 5.0</div>
        <img src="images/racaopremier.png" alt="Produto 3">
        <h5>Ração Seca PremieR Pet Nattú Abóbora para Cães Adultos de Pequeno Porte</h5>
        <p>1,0 Kg</p>
        <span>R$ 38,60</span>
        <button class="add-to-cart" data-id="3" data-price="38.60">Comprar</button>
    </div>
    <div class="card">
        <div class="rating"><i class='bx bxs-star' style='color:#feec00'></i> 5.0</div>
        <img src="images/racaopremier2.png" alt="Produto 4">
        <h5>Ração Premier Ambientes Internos para Cães Adultos Sabor Frango e Salmão</h5>
        <p>1,0 Kg</p>
        <span>R$ 39,89</span>
        <button class="add-to-cart" data-id="4" data-price="39.89">Comprar</button>
    </div>
    <div class="card">
        <div class="rating"><i class='bx bxs-star' style='color:#feec00'></i> 5.0</div>
        <img src="images/tapete.png" alt="Produto 5">
        <h5>Tapete Higiênico Papum 60x55cm para Cães de Pequeno Porte</h5>
        <p>30 Unidades</p>
        <span>R$ 52,43</span>
        <button class="add-to-cart" data-id="5" data-price="52.43">Comprar</button>
    </div>

    <div class="card">
      <div class="rating"><i class='bx bxs-star' style='color:#feec00'></i> 5.0</div>
      <img src="images/racaoquatreelife.png" alt="Produto 6">
      <h5>Ração Seca Quatree Life Salmão e Arroz Gatos Castrados</h5>
      <p>10,1 kg</p>
      <span>R$ 184,40</span>
      <button class="add-to-cart" data-id="6" data-price="184.40">Comprar</button>
  </div>
  <div class="card">
      <div class="rating"><i class='bx bxs-star' style='color:#feec00'></i> 5.0</div>
      <img src="images/racaoumida2.png" alt="Produto 7">
      <h5>Ração Úmida Pet Delícia Natural Caçarolinha de Carne</h5>
      <p>320 g</p>
      <span>R$ 20,24</span>
      <button class="add-to-cart" data-id="7" data-price="20.24">Comprar</button>
  </div>
  <div class="card">
      <div class="rating"><i class='bx bxs-star' style='color:#feec00'></i> 5.0</div>
      <img src="images/racaosuprema.png" alt="Produto 8">
      <h5>Ração Seca PremieR Pet Nattú Carne para Cães Adultos de Pequeno Porte</h5>
      <p>1,0 Kg</p>
      <span>R$ 38,60</span>
      <button class="add-to-cart" data-id="8" data-price="38.60">Comprar</button>
  </div>
  <div class="card">
      <div class="rating"><i class='bx bxs-star' style='color:#feec00'></i> 5.0</div>
      <img src="images/racaoumida3.png" alt="Produto 9">
      <h5>Ração Úmida Pet Delícia Natural Veggie Dog para Cães</h5>
      <p>320 g</p>
      <span>R$ 20,24</span>
      <button class="add-to-cart" data-id="9" data-price="20.24">Comprar</button>
  </div>
  <div class="card">
      <div class="rating"><i class='bx bxs-star' style='color:#feec00'></i> 5.0</div>
      <img src="images/racaooptimum.png" alt="Produto 10">
      <h5>Ração Seca Optimum Carne para Gatos Adultos Castrados</h5>
      <p>10,1 kg</p>
      <span>R$ 143,00</span>
      <button class="add-to-cart" data-id="10" data-price="143.00">Comprar</button>
  </div>
</div>

<main id="servicos">
  <div class="hero-image">
  <div class="hero-text">
    <h1>Serviços Oferecidos</h1>
    <p>Deslize para baixo para visualizar nossos serviços oferecidos pro seu pet</p>
  </div>
</div>
<br>
<div class="container-galeria">
  <div class="main-image">
    <img id="current-image" src="images/servicos/1.png" alt="Imagem Principal">
  </div>
  <div class="thumbnails">
    <div class="thumbnail" onclick="changeImage('images/servicos/1.png')">1</div>
    <div class="thumbnail" onclick="changeImage('images/servicos/2.png')">2</div>
    <div class="thumbnail" onclick="changeImage('images/servicos/3.png')">3</div>
    <div class="thumbnail" onclick="changeImage('images/servicos/4.png')">4</div>
    <div class="thumbnail" onclick="changeImage('images/servicos/5.png')">5</div>
  </div>
</div>

<!-- Seção de Promoções -->
<section id="promocoes" class="promocoes">
  <div class="promo-container">
    <div class="promo-image">
      <img src="images/promobanner.png" alt="Promoções Imperdíveis" style="width:100%; height:auto;">
    </div>

    <div class="promo-cards">
      <div class="promo-card">
        <img src="images/racaoformula-promo.png" alt="Ração Premier Promoção">
        <div class="promo-details">
          <h5>Petisco Fórmula Natural Cães</h5>
          <p>250 g</p>
          <span class="original-price">R$ 16,90</span>
          <span class="promo-price">R$ 13,50</span>
          <button>Comprar</button>
        </div>
      </div>

      <div class="promo-card">
        <img src="images/antipulgas.webp" alt="Areia Sanitária Promoção">
        <div class="promo-details">
          <h5>Antipulgas Credeli 112,5mg Cães</h5>
          <p>3 Comprimidos</p>
          <span class="original-price">R$ 204,50</span>
          <span class="promo-price">R$ 183,90</span>
          <button>Comprar</button>
        </div>
      </div>

      <div class="promo-card">
        <img src="images/clean-promo.webp" alt="Tapete Higiênico Promoção">
        <div class="promo-details">
          <h5>Tapete Higiênico Clean Pads 85x60cm</h5>
          <p>30 Unidades</p>
          <span class="original-price">R$ 117,90</span>
          <span class="promo-price">R$ 87,90</span>
          <button>Comprar</button>
        </div>
      </div>

      <div class="promo-card">
        <img src="images/ketsgatissimo-promo.png" alt="Ração Quatree Life Promoção">
        <div class="promo-details">
          <h5>Areia Higiênica Kets Gatíssimo</h5>
          <p>12 Kg</p>
          <span class="original-price">R$ 33,90</span>
          <span class="promo-price">R$ 23,70</span>
          <button>Comprar</button>
        </div>
      </div>
    </div>
  </div>
</section>

</main>
    
  <footer>
    <div class="footer-content">

        <div class="links">
            <h4>Ajuda e Informações</h4>
            <ul>
                <li><a href="#">Ajuda</a></li>
                <li><a href="#">Sobre Nós</a></li>
                <li><a href="perfil.php">Perfil</a></li>
            </ul>
        </div>

        <div class="links">
            <h4>Descobrir e comprar</h4>
            <ul>
                <li><a href="#">Produtos</a></li>
                <li><a href="#">Serviços</a></li>
                <li><a href="#">Promoções</a></li>
            </ul>
        </div>

        <div class="links">
            <h4>Políticas</h4>
            <ul>
                <li><a href="#">Política de Privacidade</a></li>
                <li><a href="#">Termos de Uso</a></li>
                <li><a href="#">Política de Troca e Devolução</a></li>
            </ul>
        </div>

        <!-- Linha vertical -->
        <div class="vertical-line"></div>
        <div class="midias">
            <h4>Redes Sociais</h4>
            <a href="#" class="social-icon"><span class="icon-background" ><i class='bx bxl-instagram'></i> </a>
            <a href="#" class="social-icon"><span class="icon-background"><i class='bx bxl-facebook'></i> </a>
            <a href="#" class="social-icon"><span class="icon-background"><i class='bx bxl-youtube'></i> </a>
            <br>
            <br>
            <h4>Formas de Pagamento</h4>
            <div class="payment-icons">
                <div class="payment-icon"><img src="img-icon/boleto.png" alt="Boleto bancário"></div>
                <div class="payment-icon"><img src="img-icon/visa.png" alt="Visa"></div>
                <div class="payment-icon"><img src="img-icon/card.png" alt="MasterCard"></div>
                <div class="payment-icon"><img src="img-icon/paypal.jpg" alt="PayPal"></div>
                <div class="payment-icon"><img src="img-icon/pix.png" alt="Pix"></div>
            </div>

            <div class="payment-icons">
                <div class="payment-icon"><img src="img-icon/american-express.png" alt="American Express"></div>
                <div class="payment-icon"><img src="img-icon/diners-club.png" alt="Diners Club"></div>
            </div>
        </div>
    </div>
    
    <div class="footer-bottom">
        <p>&copy; 2024 Pet Shop. Todos os direitos reservados.</p>
    </div>
</footer>

<script src="js/homepage.js"></script>

</body>
</html>