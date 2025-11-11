<?php
$host = 'localhost';
$dbname = 'petshop';
$username = 'root';
$password = 'Senai@118';

// Criar a conexão
$conn = new mysqli($host, $username, $password, $dbname);

// Verificar se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>

