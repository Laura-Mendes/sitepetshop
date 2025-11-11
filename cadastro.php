<?php
session_start(); // Inicia a sessão

// Incluir a conexão com o banco de dados
include('conexao.php');

// Inicializar variável de mensagem de erro
$error_message = "";
$mensagem = "";

// Processar login
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login-email']) && isset($_POST['login-password'])) {
    $email = $_POST['login-email'];
    $senha = $_POST['login-password'];

    // Consultar o banco de dados para encontrar o usuário com o email fornecido
    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar se o email existe no banco de dados
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verificar se a senha fornecida corresponde à senha criptografada no banco
        if (password_verify($senha, $user['senha'])) {
            $_SESSION['usuario_id'] = $user['id'];
            $_SESSION['usuario_nome'] = $user['nome'];
            $_SESSION['email_usuario'] = $user['email'];

            // Redirecionar para a página inicial
            header("Location: index.php");
            exit;
        } else {
            $error_message = "Senha incorreta!";
        }
    } else {
        $error_message = "Email não encontrado!";
    }
}

// Processar cadastro
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register-name'])) {
    $nome = $_POST['register-name'];
    $email = $_POST['register-email'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['register-password'];

    // Validar a senha (confirmar se as senhas batem)
        $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

        // Em seguida, os dados do usuário são inseridos na tabela 'usuarios' do banco de dados:
        $sql = "INSERT INTO usuarios (nome, email, telefone, senha)
                VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $nome, $email, $telefone, $senhaCriptografada);
        if ($stmt->execute()) {
            $mensagem = "<div class='message'>Usuário cadastrado com sucesso! Faça login para acessar sua conta.</div>";
        } else {
            $mensagem = "<div class='error-message'>Erro ao cadastrar usuário!</div>";
        }
    }

// Fechar a conexão
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login e Cadastro</title>
    <link rel="stylesheet" href="css/cadastro.css">
</head>
<body>

<!-- Logo para voltar para a página inicial -->
    <a href="index.php" class="logo-container">
        <img src="logo/logo4x4.png" alt="Logo" class="logo">
    </a>

    <div class="form-container">
         <!-- Mensagem global de cadastro -->
    <?php if (!empty($mensagem)): ?>
        <?php echo $mensagem; ?>
    <?php endif; ?>
        <div class="tab-wrapper">
            <button class="tab-button" id="login-tab">Login</button>
            <button class="tab-button" id="register-tab">Criar conta</button>
        </div>

        <!-- Formulário de Login -->
        <div class="form-content" id="login-form">
            <h2>Login</h2>
            <form action="" method="POST">
                <label for="login-email">Email:</label>
                <input type="email" id="login-email" name="login-email" required placeholder="Digite seu email">
                
                <label for="login-password">Senha:</label>
                <input type="password" id="login-password" name="login-password" required placeholder="Digite sua senha">
                
                <button type="submit" class="submit-button">Entrar</button>
            </form>
            <!-- Exibe mensagem de erro, se houver -->
            <?php if (!empty($error_message)): ?>
                <div class="error-message"><?= htmlspecialchars($error_message); ?></div>
            <?php endif; ?>
        </div>

        <!-- Formulário de Cadastro -->
        <div class="form-content" id="register-form">
            <h2>Crie sua conta</h2>
            <form action="" method="POST">
                <label for="register-name">Nome Completo:</label>
                <input type="text" id="register-name" name="register-name" required placeholder="Digite seu nome completo">

                <label for="register-email">Email:</label>
                <input type="email" id="register-email" name="register-email" required placeholder="Digite seu email">

                <label for="telefone">Telefone:</label>
                <input type="tel" id="telefone" name="telefone" placeholder="(00) 00000-0000" required>

                <label for="register-password">Senha:</label>
                <input type="password" id="register-password" name="register-password" required placeholder="Digite uma senha">

                <label for="confirm-password">Confirme a Senha:</label>
                <input type="password" id="confirm-password" name="confirm-password" required placeholder="Confirme sua senha">

                <div class="terms">
                    <input type="checkbox" id="terms" name="terms" required>
                    <label for="terms">Aceito os <a href="#">termos e condições</a></label>
                </div>

                <button type="submit" class="submit-button">Cadastrar</button>
            </form>
        </div>
    </div>

    <script src="js/cadastro.js"></script>
</body>
</html>