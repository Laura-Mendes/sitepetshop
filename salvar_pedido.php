<?php
// Incluir a conexão com o banco de dados
include('conexao.php');

// Verifica se o usuário está logado
session_start();
if (!isset($_SESSION['usuario_id'])) {
    die("Usuário não está logado.");
}

// Receber dados do carrinho
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['produtos'])) {
    $produtos = json_decode($_POST['produtos'], true); // Decodifica o JSON enviado
    if (!empty($produtos)) {
        // Calcula o total do pedido
        $totalPedido = 0;
        foreach ($produtos as $produto) {
            $totalPedido += $produto['price'] * $produto['quantity'];
        }

        // Criar o pedido
        $usuarioId = $_SESSION['usuario_id'];
        $usuarioNome = $_SESSION['usuario_nome']; // Nome do usuário na sessão
        $sqlPedido = "INSERT INTO pedidos (usuario_nome, total, usuario_id) 
                      VALUES ('$usuarioNome', '$totalPedido', '$usuarioId')";
        if ($conn->query($sqlPedido) === TRUE) {
            $pedidoId = $conn->insert_id; // Obter o ID do pedido criado

            // Inserir os produtos na tabela de itens do pedido
            foreach ($produtos as $produto) {
                $produtoId = $conn->real_escape_string($produto['id']);
                $preco = $conn->real_escape_string($produto['price']);
                $quantidade = $conn->real_escape_string($produto['quantity']);

                $sqlItem = "INSERT INTO itens_pedido (pedido_id, produto_id, quantidade, preco) 
                            VALUES ('$pedidoId', '$produtoId', '$quantidade', '$preco')";
                if (!$conn->query($sqlItem)) {
                    echo "Erro ao salvar produto: " . $conn->error;
                    $conn->close();
                    exit;
                }
            }
            echo "Pedido salvo com sucesso!";
        } else {
            echo "Erro ao criar pedido: " . $conn->error;
        }
    } else {
        echo "Carrinho vazio ou dados inválidos.";
    }
} else {
    echo "Método inválido ou dados não enviados.";
}

$conn->close();
?>
