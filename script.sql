CREATE DATABASE totalpass;
USE totalpass;

CREATE TABLE Usuario (
idusuario INTEGER AUTO_INCREMENT PRIMARY KEY,
senha VARCHAR(1000),
sobrenome VARCHAR(1000),
nome VARCHAR(200),
email VARCHAR(1000),
token VARCHAR(10)
);

CREATE TABLE Conta (
idconta INTEGER AUTO_INCREMENT PRIMARY KEY,
senha VARCHAR(500),
nome VARCHAR(500),
login VARCHAR(1000),
idusuario INTEGER,
FOREIGN KEY(IDUsuario) REFERENCES Usuario (IDUsuario) ON DELETE CASCADE
);

