CREATE DATABASE tcc;

USE tcc;

CREATE TABLE usuario(

 id_usuario int(20) NOT NULL AUTO_INCREMENT,
 nome varchar(50) NOT NULL,
 senha varchar(25) NOT NULL,
 PRIMARY KEY(id_usuario)
 
 );
 
CREATE TABLE fornecedor(
  cnpj char(15) NOT NULL,
  nome varchar(50) NOT NULL,  
  PRIMARY KEY (cnpj)

);

 CREATE TABLE cliente(
   cpf char(11) NOT NULL,
  nome varchar(50) NOT NULL,
  email varchar(50) NULL,
  PRIMARY KEY (cpf) 

);

CREATE TABLE contato(
  id_contato int(20) NOT NULL AUTO_INCREMENT,
  ddd varchar(2) NOT NULL,
  telefone varchar(9) NOT NULL,
  cpf char(11) NULL,
  PRIMARY KEY (id_contato),
  FOREIGN KEY (cpf) REFERENCES cliente(cpf)
);

CREATE TABLE endereco(
  id_endereco int(20) NOT NULL AUTO_INCREMENT,
  rua varchar(100) NOT NULL,
  bairro varchar(50) NOT NULL,
  complemento varchar(50) NULL,
  cep varchar(8) NOT NULL,
  cidade varchar(50) NOT NULL,
  estado varchar (2) NOT NULL,
  cpf char(11) NULL,
  PRIMARY KEY (id_endereco),
  FOREIGN KEY (cpf) REFERENCES cliente(cpf)
  

);


CREATE TABLE venda(
id_venda int(20) NOT NULL AUTO_INCREMENT,
valor_total float(20) NOT NULL,
pagamento varchar (20) NOT NULL,
quantidade int(20) NOT NULL,
codigo_fiscal varchar(30) NOT NULL,
cpf char(11) NOT NULL,
data_venda date NOT NULL,
PRIMARY KEY (id_venda),
FOREIGN KEY (cpf) REFERENCES cliente(cpf)
);


CREATE TABLE produto(
    id_produto int(11) NOT NULL AUTO_INCREMENT,
    produto varchar(50) NOT NULL,
    cor varchar(24) NOT NULL,
    valor float(50) NOT NULL,
    quantidade int(54) NOT NULL,
    codigo_fiscal varchar(54) NOT NULL,
    data_compra  date NOT NULL, 
    cnpj_fornecedor varchar(54) NOT NULL,
    fornecedor VARCHAR(50) NOT NULL,
    PRIMARY KEY (id_produto)
  );

INSERT INTO produto(produto, cor, valor, quantidade, fornecedor,cnpj_fornecedor, data_compra, codigo_fiscal)
			 VALUES ('Marmore','Preto','50.50','200','MARMORES C&R','45548845588','08052020','12345');

INSERT INTO cliente(nome, cpf, email)
VALUES ('Lucas','55566644498','Lucas@email.com');

INSERT INTO endereco(rua, bairro, complemento, cep, cidade, estado, cpf)
VALUES ('Rua dos canaviais','vila São Paulo','','04965331','São Paulo','SP','55566644498');

INSERT INTO contato(ddd, telefone, cpf)
VALUES ('11','955664498','55566644498');


INSERT INTO usuario(nome,senha)
VALUES ('Daniel','12345');
