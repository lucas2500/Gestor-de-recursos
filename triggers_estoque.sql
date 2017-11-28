
DROP TRIGGER cascataBrote;


DELIMITER $

CREATE TRIGGER cascata AFTER INSERT ON saidaFrances
FOR EACH ROW
BEGIN 
UPDATE estoque SET qtdKG = qtdKG - 1
WHERE ID = 1;
UPDATE estoque SET qtdKG = qtdKG - 50
WHERE ID = 2;
UPDATE estoque SET qtdKG = qtdKG - 0.5
WHERE ID = 3;
UPDATE estoque SET qtdKG = qtdKG - 0.1
WHERE ID = 4;
UPDATE estoque SET qtdKG = qtdKG - 1
WHERE ID = 5;
UPDATE estoque SET qtdKG = qtdKG - 0.2
WHERE ID = 6;
END$

DELIMITER $

CREATE TRIGGER cascataDoceComprido AFTER INSERT ON saidaDoceComprido
FOR EACH ROW
BEGIN 
UPDATE estoque SET qtdKG = qtdKG - 1
WHERE ID = 1;
UPDATE estoque SET qtdKG = qtdKG - 50
WHERE ID = 2;
UPDATE estoque SET qtdKG = qtdKG - 0.5
WHERE ID = 3;
UPDATE estoque SET qtdKG = qtdKG - 7
WHERE ID = 5;
UPDATE estoque SET qtdKG = qtdKG - 0.4
WHERE ID = 6;
END$

DELIMITER $

CREATE TRIGGER cascataDoceCortado AFTER INSERT ON saidaDoceCortado
FOR EACH ROW
BEGIN 
UPDATE estoque SET qtdKG = qtdKG - 1
WHERE ID = 1;
UPDATE estoque SET qtdKG = qtdKG - 50
WHERE ID = 2;
UPDATE estoque SET qtdKG = qtdKG - 0.5
WHERE ID = 3;
UPDATE estoque SET qtdKG = qtdKG - 7
WHERE ID = 5;
UPDATE estoque SET qtdKG = qtdKG - 0.4
WHERE ID = 6;
END$

DELIMITER $

CREATE TRIGGER cascataDoceEnrolado AFTER INSERT ON saidaDoceEnrolado
FOR EACH ROW
BEGIN 
UPDATE estoque SET qtdKG = qtdKG - 1
WHERE ID = 1;
UPDATE estoque SET qtdKG = qtdKG - 50
WHERE ID = 2;
UPDATE estoque SET qtdKG = qtdKG - 0.5
WHERE ID = 3;
UPDATE estoque SET qtdKG = qtdKG - 7
WHERE ID = 5;
UPDATE estoque SET qtdKG = qtdKG - 0.4
WHERE ID = 6;
END$

DELIMITER $

CREATE TRIGGER cascataBrote AFTER INSERT ON saidaBrote
FOR EACH ROW
BEGIN 
UPDATE estoque SET qtdKG = qtdKG - 1
WHERE ID = 1;
UPDATE estoque SET qtdKG = qtdKG - 50
WHERE ID = 2;
UPDATE estoque SET qtdKG = qtdKG - 0.5
WHERE ID = 3;
UPDATE estoque SET qtdKG = qtdKG - 5
WHERE ID = 5;
UPDATE estoque SET qtdKG = qtdKG - 0.3
WHERE ID = 6;
END$

DELIMITER $

CREATE TRIGGER cascataCarteira AFTER INSERT ON saidaCarteira
FOR EACH ROW
BEGIN 
UPDATE estoque SET qtdKG = qtdKG - 1
WHERE ID = 1;
UPDATE estoque SET qtdKG = qtdKG - 50
WHERE ID = 2;
UPDATE estoque SET qtdKG = qtdKG - 0.5
WHERE ID = 3;
UPDATE estoque SET qtdKG = qtdKG - 5
WHERE ID = 5;
UPDATE estoque SET qtdKG = qtdKG - 0.3
WHERE ID = 6;
END$

DELIMITER $

CREATE TRIGGER cascataSeda AFTER INSERT ON saidaSeda
FOR EACH ROW
BEGIN 
UPDATE estoque SET qtdKG = qtdKG - 1
WHERE ID = 1;
UPDATE estoque SET qtdKG = qtdKG - 50
WHERE ID = 2;
UPDATE estoque SET qtdKG = qtdKG - 0.5
WHERE ID = 3;
UPDATE estoque SET qtdKG = qtdKG - 5
WHERE ID = 5;
UPDATE estoque SET qtdKG = qtdKG - 0.3
WHERE ID = 6;
END$

DELIMITER $

CREATE TRIGGER cascataCrioulo AFTER INSERT ON saidaCrioulo
FOR EACH ROW
BEGIN 
UPDATE estoque SET qtdKG = qtdKG - 1
WHERE ID = 1;
UPDATE estoque SET qtdKG = qtdKG - 50
WHERE ID = 2;
UPDATE estoque SET qtdKG = qtdKG - 0.5
WHERE ID = 3;
UPDATE estoque SET qtdKG = qtdKG - 5
WHERE ID = 5;
UPDATE estoque SET qtdKG = qtdKG - 0.3
WHERE ID = 6;
END$

DELIMITER $

CREATE TRIGGER cascataBolinha AFTER INSERT ON saidaBolinha
FOR EACH ROW
BEGIN 
UPDATE estoque SET qtdKG = qtdKG - 1
WHERE ID = 1;
UPDATE estoque SET qtdKG = qtdKG - 50
WHERE ID = 2;
UPDATE estoque SET qtdKG = qtdKG - 0.5
WHERE ID = 3;
UPDATE estoque SET qtdKG = qtdKG - 5
WHERE ID = 5;
UPDATE estoque SET qtdKG = qtdKG - 0.3
WHERE ID = 6;
END$