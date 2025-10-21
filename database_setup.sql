-- Script SQL para criar o banco de dados da Livraria Universal
-- Execute este script no MySQL para configurar o banco de dados

CREATE DATABASE IF NOT EXISTS bookstore;
USE bookstore;

-- Tabela de usuários
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    admin TINYINT(1) DEFAULT 0,
    secret_psw VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabela de autores
CREATE TABLE IF NOT EXISTS authors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabela de livros
CREATE TABLE IF NOT EXISTS books (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    isbn VARCHAR(20),
    image VARCHAR(255),
    file VARCHAR(255),
    is_active TINYINT(1) DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabela de relacionamento entre livros e autores (many-to-many)
CREATE TABLE IF NOT EXISTS book_author (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_book INT NOT NULL,
    id_author INT NOT NULL,
    FOREIGN KEY (id_book) REFERENCES books(id) ON DELETE CASCADE,
    FOREIGN KEY (id_author) REFERENCES authors(id) ON DELETE CASCADE,
    UNIQUE KEY unique_book_author (id_book, id_author)
);

-- Tabela de compras
CREATE TABLE IF NOT EXISTS purchases (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_book INT NOT NULL,
    id_user INT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_book) REFERENCES books(id) ON DELETE CASCADE,
    FOREIGN KEY (id_user) REFERENCES users(id) ON DELETE CASCADE
);

-- Inserir dados de exemplo

-- Inserir usuário administrador padrão
INSERT INTO users (name, email, password, admin, secret_psw) VALUES 
('Administrador', 'admin@livraria.com', 'admin123', 1, 'admin'),
('Usuário Teste', 'user@teste.com', 'user123', 0, 'teste');

-- Inserir alguns autores
INSERT INTO authors (name) VALUES 
('Machado de Assis'),
('Clarice Lispector'),
('Jorge Amado'),
('Cecília Meireles'),
('Carlos Drummond de Andrade');

-- Inserir alguns livros
INSERT INTO books (title, description, price, isbn, image, file) VALUES 
('Dom Casmurro', 'Romance clássico brasileiro que narra a história de Bentinho e Capitu.', 29.90, '978-85-359-0277-5', 'dom_casmurro.jpg', 'dom_casmurro.pdf'),
('A Hora da Estrela', 'Último romance de Clarice Lispector, publicado em 1977.', 34.90, '978-85-359-0278-2', 'hora_estrela.jpg', 'hora_estrela.pdf'),
('Capitães da Areia', 'Romance de Jorge Amado sobre meninos de rua em Salvador.', 32.90, '978-85-359-0279-9', 'capitaes_areia.jpg', 'capitaes_areia.pdf'),
('Romanceiro da Inconfidência', 'Poesia épica de Cecília Meireles sobre a Inconfidência Mineira.', 28.90, '978-85-359-0280-5', 'romanceiro.jpg', 'romanceiro.pdf'),
('A Rosa do Povo', 'Coletânea de poemas de Carlos Drummond de Andrade.', 26.90, '978-85-359-0281-2', 'rosa_povo.jpg', 'rosa_povo.pdf');

-- Associar autores aos livros
INSERT INTO book_author (id_book, id_author) VALUES 
(1, 1), -- Dom Casmurro - Machado de Assis
(2, 2), -- A Hora da Estrela - Clarice Lispector
(3, 3), -- Capitães da Areia - Jorge Amado
(4, 4), -- Romanceiro da Inconfidência - Cecília Meireles
(5, 5); -- A Rosa do Povo - Carlos Drummond de Andrade

-- Inserir algumas compras de exemplo
INSERT INTO purchases (id_book, id_user, price) VALUES 
(1, 2, 29.90),
(2, 2, 34.90);

-- Criar diretórios necessários para uploads
-- Nota: Os diretórios serão criados automaticamente pelo PHP quando necessário
