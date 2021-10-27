DROP DATABASE minhastarefas;

CREATE DATABASE IF NOT EXISTS minhastarefas;

USE minhastarefas;

CREATE TABLE IF NOT EXISTS Tb_usuario(
id_usuario INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
nome_usuario VARCHAR(80) NOT NULL,
senha_usuario VARCHAR(20) NOT NULL,
email_usuario VARCHAR(80) UNIQUE NOT NULL,
idade_usuario INT NOT NULL,
dataNasc_usuario DATE NOT NULL,
sexo_usuario INT NOT NULL
);

CREATE TABLE IF NOT EXISTS Tb_materias(
id_materia INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
nome_materia VARCHAR(50) NOT NULL);

CREATE TABLE IF NOT EXISTS Tb_tarefas(
id_tarefa INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
nome_tarefa VARCHAR(50) NOT NULL,
descricao_tarefa TEXT NULL,
arquivo_tarefa LONGBLOB NOT NULL,
dataEntrega_tarefa DATE NOT NULL,
fk_usuario INT NOT NULL,
fk_materias INT NOT NULL
);


ALTER TABLE Tb_tarefas ADD CONSTRAINT fk_usuario FOREIGN KEY (fk_usuario) REFERENCES Tb_usuario (id_usuario);
ALTER TABLE Tb_tarefas ADD CONSTRAINT fk_materias FOREIGN KEY (fk_materias) REFERENCES Tb_materias (id_materia);