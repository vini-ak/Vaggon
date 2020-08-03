/* CRIAÇÃO DE TABELAS */

CREATE DATABASE vaggon;

CREATE TABLE users (
	id_user INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	user_email VARCHAR(120) NOT NULL,
	password VARCHAR(50) NOT NULL
);

CREATE TABLE tasks (
	id_tarefa INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	titulo VARCHAR(100) NOT NULL,
	descricao TEXT NOT NULL,
	data_inicio DATETIME NOT NULL,
	data_termino DATETIME,
	ativo BIT NOT NULL DEFAULT 1,
	id_user INT NOT NULL,
	FOREIGN KEY(id_user) REFERENCES users(id_user)
);


