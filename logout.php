<?php
session_start();
// Limpa os dados de sessão
session_destroy();

// Limpar o carrinho do localStorage (se necessário, via JavaScript)
echo "<script>localStorage.removeItem('cart_' + '{$_SESSION['email_usuario']}');</script>";

// Redireciona para a página inicial ou de login
header('Location: index.php');
exit();
?>