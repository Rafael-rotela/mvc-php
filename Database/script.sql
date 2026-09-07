create database biblioteca;
use biblioteca;

CREATE TABLE autor (
	id_autor INT AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    data_nascimento DATE NOT NULL,
    cpf CHAR(11) NOT NULL,
    PRIMARY KEY(id_autor)
);

CREATE TABLE categoria(
	id_categoria INT AUTO_INCREMENT,
    descricao VARCHAR(200) NOT NULL,
    PRIMARY KEY(id_categoria)
);

CREATE TABLE livro(
	id_livro INT AUTO_INCREMENT,
    id_categoria INT NOT NULL,
    titulo VARCHAR(170) NOT NULL,
    editora VARCHAR(100) NOT NULL,
    ano YEAR NOT NULL,
    isbn VARCHAR(100) NOT NULL,
    PRIMARY KEY(id_livro),
    FOREIGN KEY (id_categoria) REFERENCES categoria(id_categoria)
);

CREATE TABLE aluno (
	id_aluno INT AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    RA INT,
    curso VARCHAR(150),
    PRIMARY KEY(id_aluno)
);

CREATE TABLE usuario(
	id_usuario INT AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    senha VARCHAR(200) NOT NULL,
    PRIMARY KEY(id_usuario)
);

CREATE TABLE livro_autor(
    id_livro INT NOT NULL,
    id_autor  INT NOT NULL,
    FOREIGN KEY(id_livro) REFERENCES livro(id_livro),
    FOREIGN KEY(id_autor) REFERENCES autor(id_autor),
    PRIMARY KEY(id_livro, id_autor)
);

CREATE TABLE emprestimo(
	id_emprestimo INT AUTO_INCREMENT,
    data_emprestimo DATE DEFAULT CURRENT_TIMESTAMP,
    data_devolucao  DATE NOT NULL,
    id_usuario INT NOT NULL, 
    id_aluno INT NOT NULL,
    id_livro INT NOT NULL,
    PRIMARY KEY(id_emprestimo),
    FOREIGN KEY(id_livro) REFERENCES livro(id_livro),
    FOREIGN KEY(id_usuario) REFERENCES usuario(id_usuario),
    FOREIGN KEY(id_aluno) REFERENCES aluno(id_aluno)
);