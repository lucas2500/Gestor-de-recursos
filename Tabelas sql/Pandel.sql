CREATE TABLE estoque(

nomeProd VARCHAR(150),
prodPeso VARCHAR(80),
qtdMin FLOAT,
valorUnit VARCHAR(100),
qtdKG decimal(9,2),
atualizacao VARCHAR(30),
ID INT PRIMARY KEY AUTO_INCREMENT
);

SELECT * FROM estoque;

DROP TABLE estoque;

CREATE TABLE expedicao(

nomeCliente VARCHAR(150),
descricao LONGTEXT,
valorTotal VARCHAR(100),
dataVenda VARCHAR(50),
ID INT PRIMARY KEY AUTO_INCREMENT
);

SELECT * FROM expedicao;

DROP TABLE expedicao;

CREATE TABLE duplicata(

nomeForn VARCHAR(150),
descricao LONGTEXT,
valorTotal VARCHAR(100),
dtCompra VARCHAR(50),
dtVencimento VARCHAR(50),
ID INT PRIMARY KEY AUTO_INCREMENT
);

SELECT * FROM duplicata;

DROP TABLE duplicata;

CREATE TABLE registroVendas(

nomeCliente VARCHAR(150),
descricao LONGTEXT,
valorTotal VARCHAR(100),
dataVenda VARCHAR(50),
ID INT PRIMARY KEY AUTO_INCREMENT
);

DROP TABLE registroVendas;

CREATE TABLE registroCompras(

nomeForn VARCHAR(100),
descricao LONGTEXT,
valorTotal VARCHAR(50),
dtCompra VARCHAR(15),
dtVencimento VARCHAR(15),
ID INT PRIMARY KEY AUTO_INCREMENT
);

DROP TABLE registroCompras;


CREATE TABLE fornada(

tipoProduto VARCHAR(100),
qtdProduzida VARCHAR(80),
dataFornada VARCHAR(15),
ID INT PRIMARY KEY AUTO_INCREMENT
);

SELECT * FROM fornada;

DROP TABLE fornada;

CREATE TABLE fichaTecnica(

nomeProd VARCHAR(150),
farinhaTrigo VARCHAR(80),
sal VARCHAR(80),
acucar VARCHAR(80),
adipanC VARCHAR(80),
docemix VARCHAR(80),
fermentoInsta VARCHAR(80),
agua VARCHAR(80),
ID INT PRIMARY KEY AUTO_INCREMENT
);

SELECT * FROM fichaTecnica;

DROP TABLE fichaTecnica;

CREATE TABLE cliente(

nome VARCHAR(100),
cnpj VARCHAR(60),
telefone VARCHAR(40),
rua VARCHAR(100),
numero VARCHAR(15),
cidade VARCHAR(100),
bairro VARCHAR(100),
cep VARCHAR(40),
ID INT PRIMARY KEY AUTO_INCREMENT
);

SELECT * FROM cliente;

CREATE TABLE fornecedor(

nome VARCHAR(100),
cnpj VARCHAR(40),
telefone VARCHAR(40),
ID INT PRIMARY KEY AUTO_INCREMENT
);

SELECT * FROM fornecedor;

DROP TABLE fornecedor;