-- Criação do Banco de Dados
CREATE DATABASE IF NOT EXISTS help_desk;
USE help_desk;

-- Tabela de Usuários
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    perfil VARCHAR(20) DEFAULT 'user' -- 'admin' ou 'user'
);

-- Tabela de Chamados
CREATE TABLE IF NOT EXISTS chamados (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    titulo VARCHAR(100) NOT NULL,
    categoria VARCHAR(50) NOT NULL,
    descricao TEXT NOT NULL,
    status VARCHAR(20) DEFAULT 'aberto',
    data_criacao DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

-- INSERINDO USUÁRIO ADMINISTRADOR PADRÃO
-- Senha: "123456" (Hash gerado via PHP password_hash)
INSERT INTO usuarios (nome, email, senha, perfil) VALUES 
('Administrador', 'admin@helpdesk.com', '$2y$10$e8D.A7.e8D.A7.e8D.A7.e8D.A7.e8D.A7.e8D.A7.e8D.A7.e8D', 'admin');

-- INSERINDO UM USUÁRIO COMUM PARA TESTE
INSERT INTO usuarios (nome, email, senha, perfil) VALUES 
('Usuario Teste', 'user@helpdesk.com', '$2y$10$e8D.A7.e8D.A7.e8D.A7.e8D.A7.e8D.A7.e8D.A7.e8D.A7.e8D', 'user');