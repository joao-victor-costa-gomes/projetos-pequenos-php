-- configuração para aceitar caracteres especiais e emojis
CREATE DATABASE IF NOT EXISTS help_desk CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE help_desk;

-- tabela usuários 
CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    perfil ENUM('admin', 'user') DEFAULT 'user',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- tabela chamados 
CREATE TABLE IF NOT EXISTS chamados (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    titulo VARCHAR(100) NOT NULL,
    categoria VARCHAR(50) NOT NULL,
    descricao TEXT NOT NULL,
    status ENUM('aberto', 'resolvido', 'excluido') DEFAULT 'aberto',
    resposta_admin TEXT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

-- dados de teste
-- Admin Padrão (Senha: 123456)
INSERT INTO usuarios (nome, email, senha, perfil) VALUES 
('Administrador Supremo', 'admin@helpdesk.com', '$2y$10$e8D.A7.e8D.A7.e8D.A7.e8D.A7.e8D.A7.e8D.A7.e8D.A7.e8D', 'admin');

-- Usuário Comum Padrão (Senha: 123456)
INSERT INTO usuarios (nome, email, senha, perfil) VALUES 
('José Usuário', 'user@helpdesk.com', '$2y$10$e8D.A7.e8D.A7.e8D.A7.e8D.A7.e8D.A7.e8D.A7.e8D.A7.e8D', 'user');