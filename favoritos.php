<?php
session_start();

include('conexao.php');

$subtotal = 0;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site Petshop PetCare</title>
    <link rel="stylesheet" href="css/favoritos.css?v=<?php echo filemtime('css/favoritos.css'); ?>">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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


    <br>
    <div class="title">
    <h1>Meus favoritos</h1>

    <div class="container1">
    <div class="card">
        <img decoding="async" src="images/racaooptimum.png" alt="Imagem de exemplo">
        <p>Ração Seca Optimum Carne para Gatos Adultos Castrados</p>
        <h2>R$143,00</h2>
        <div>
        <button class="buy-button">Comprar</button> 
        <button class="remove-button">Remover</button>
    </div>
    </div>

    <div class="card">
        <img decoding="async" src="images/areia.png" alt="Imagem de exemplo">
        <p>Areia Sanitária Mineral Meau Super Seca para Gatos</p>
        <h2>R$43,12</h2>
        <div>
            <button class="buy-button">Comprar</button> 
            <button class="remove-button">Remover</button>
        </div>
    </div>

     <div class="card">
        <img decoding="async" src="images/tapete.png" alt="Imagem de exemplo">
        <p>Tapete Higiênico Papum 60x55cm para Cães de Pequeno Porte</p>
        <h2>R$52,43</h2>
        <div>
            <button class="buy-button">Comprar</button> 
            <button class="remove-button">Remover</button>
        </div>
    </div>
</div>
</div>

<footer>
    <div class="footer-content">

        <div class="links">
            <h4>Ajuda e Informações</h4>
            <ul>
                <li><a href="#">Ajuda</a></li>
                <li><a href="#">Sobre Nós</a></li>
                <li><a href="#">Perfil</a></li>
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

<script src="js/favoritos.js"></script>

</body>
</html>