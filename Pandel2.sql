CREATE TABLE entradaEstoque(

codProd INT,
peso VARCHAR(80),
totalKg FLOAT,
ID INT PRIMARY KEY AUTO_INCREMENT
);

SELECT * FROM entradaEstoque;

DROP TABLE entradaEstoque;

DROP TRIGGER atualiza_estoque;

DROP TRIGGER baixa_estoque;

CREATE TABLE saidaEstoque(

codProd INT,
qtdUsada FLOAT,
ID INT PRIMARY KEY AUTO_INCREMENT
);

SELECT * FROM saidaEstoque;

DROP TABLE saidaEstoque;

DELIMITER $

CREATE TRIGGER atualiza_estoque AFTER INSERT ON entradaEstoque
FOR EACH ROW
BEGIN 
UPDATE estoque SET qtdKG = qtdKG + NEW.totalKg
WHERE ID = NEW.codProd;
UPDATE estoque SET prodPeso = New.peso
WHERE ID = NEW.codProd;
END$

DELIMITER $

CREATE TRIGGER baixa_estoque AFTER INSERT ON saidaEstoque
FOR EACH ROW
BEGIN 
UPDATE estoque SET qtdKG = qtdKG - NEW.qtdUsada
WHERE ID = NEW.codProd;
END$

