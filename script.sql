-- Gera��o de Modelo f�sico
-- Sql ANSI 2003 - brModelo.



CREATE TABLE Usuario (
IDUsuario INTEGER PRIMARY KEY,
Senha VARCHAR(1000),
Sobrenome VARCHAR(1000),
Nome VARCHAR(200),
Email VARCHAR(1000)
)

CREATE TABLE Conta (
IDConta INTEGER PRIMARY KEY,
Senha VARCHAR(500),
Nome VARCHAR(500),
Login VARCHAR(1000),
IDUsuario INTEGER,
FOREIGN KEY(IDUsuario) REFERENCES Usuario (IDUsuario)
)

