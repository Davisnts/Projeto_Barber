CREATE TABLE AVALIACOES (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL,
  telefone VARCHAR(15) NOT NULL,
  data_nascimento DATE NOT NULL,
  avaliacao INT(1) NOT NULL,
  mensagem VARCHAR(255) NOT NULL,
  data_hora TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE SEXO (
  ID_SEXO INT(1) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  DESCRICAO VARCHAR(20) NOT NULL
);

CREATE TABLE CLIENTES (
  COD_CLIENTE INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
  NOME_CLIENTE TEXT(20) NOT NULL,
  SOBRENOME_CLIENTE TEXT(100),
  CPF TEXT(11) NOT NULL UNIQUE KEY,
  ID_SEXO INT(6),
  DEBITOS INTEGER,
  CELULAR TEXT(11),
  EMAIL TEXT(128),
  FOTO_CLIENT TEXT(255),
  CONSTRAINT FK_CLIENTES_SEXO FOREIGN KEY (ID_SEXO) REFERENCES SEXO (ID_SEXO)
);