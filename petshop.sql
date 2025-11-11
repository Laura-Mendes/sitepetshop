CREATE DATABASE IF NOT EXISTS petshop;
USE petshop;

CREATE TABLE usuarios (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    email VARCHAR(100),
    telefone VARCHAR(15),
    senha VARCHAR(255),
    data_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE produtos (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255),
    descricao TEXT,
    preco DECIMAL(10,2),
    imagem VARCHAR(255),
    data_adicionado DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE pedidos (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    data_pedido DATETIME DEFAULT CURRENT_TIMESTAMP,
    usuario_nome VARCHAR(255),
    total DECIMAL(10,2),
    usuario_id INT(11),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

CREATE TABLE itens_pedido (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    pedido_id INT(11),
    produto_id INT(11),
    quantidade INT(11),
    preco DECIMAL(10,2),
    FOREIGN KEY (pedido_id) REFERENCES pedidos(id),
    FOREIGN KEY (produto_id) REFERENCES produtos(id)
);