CREATE DATABASE IF NOT EXISTS db_conteiner; /*o IF NOT EXISTS serve para cria a tabela somente se ainda não tiver sido criada*/ 
USE db_conteiner;
CREATE TABLE tb_conteiner(
	id INT NOT NULL AUTO_INCREMENT,/*id que sera a chave primaria, NOT NULL para não receber um valor vazio ou nulo, auto_incremente para receber uma*/
    n_conteiner CHAR(11), /* deve receber 4 letres e 7 numeros de indentificação*/
	cliente VARCHAR(80) NOT NULL,
    tipo ENUM('20', '40'), 
	`status` ENUM ('Cheio', 'Vazio'),
    categoria ENUM ('Importação', 'Exportação'),
    
    PRIMARY KEY(id)
    
)ENGINE=InnoDB DEFAULT CHARSET=UTF8;/* PARA ACEITAR ACENTUAÇÕES e caracteres DA LINGUAGEM*/

DESC tb_conteiner;

CREATE TABLE tb_movimentacao(
	id INT NOT NULL AUTO_INCREMENT,
    id_conteiner INT NOT NULL, /*será nossa chave estrangeira para indicar qual será nosso conteiner movimentado*/
    tipo ENUM('Embarque','Descarga','Gate-in','Gate-Out','Reposicionamento','Pesagem','Scanner'),
    inicio VARCHAR(30),
    fim VARCHAR(30),
    
    PRIMARY KEY (id),
    FOREIGN KEY(id_conteiner) REFERENCES tb_conteiner(id) /*será nossa chave estrangeira e faremos a referecia a nossa chave do tb_conteiner (id) */

	ON DELETE CASCADE
    ON UPDATE CASCADE /*Esses dois comando servem para quando se deletar ou editar um conteiner seja excluido ou modificado também nas movimentações em cascata*/
)ENGINE=InnoDB DEFAULT CHARSET=UTF8;

DESC tb_movimentacao; 

SELECT * FROM tb_conteiner;		/*verificando os registro*/
SELECT * FROM tb_movimentacao;	/*ainda não tem nenhum registro nas tabelas*/


INSERT INTO tb_conteiner (nome, cliente, tipo, status, categoria) VALUES 
('RAVI1234567','Empresa LTDA', '20', 'Vazio','Exportação');

INSERT INTO tb_movimentacao(id_conteiner, tipo, inicio, fim ) VALUES
('1','Desenbarque','09/10/2010 15:00','15/10/2010 06:00')

/*----------------------------------------RELATÓRIOS-------------------------------------------*/