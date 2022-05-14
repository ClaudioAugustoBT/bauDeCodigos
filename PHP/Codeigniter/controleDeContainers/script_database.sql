-- DROP DATABASE `t_container`;
CREATE SCHEMA IF NOT EXISTS `t_container` DEFAULT CHARACTER SET utf8 ;
USE `t_container` ;

CREATE TABLE IF NOT EXISTS `t_container`.`tb_tipo_container` (
  `cd_tipo_container` INT NOT NULL AUTO_INCREMENT,
  `nm_tipo_container` VARCHAR(45) NOT NULL,
  `sg_tipo_container` CHAR(4) NOT NULL,
  `ic_tamanho_container` CHAR(4) NOT NULL,
  PRIMARY KEY (`cd_tipo_container`));

CREATE TABLE IF NOT EXISTS `t_container`.`tb_container` (
  `cd_container` INT NOT NULL AUTO_INCREMENT,
  `cd_alfanum_container` VARCHAR(11) NOT NULL,
  `nm_cliente` VARCHAR(45) NOT NULL,
  `cd_tipo_container` INT NOT NULL,
  `ic_status` CHAR(1) NOT NULL,
  `ic_categoria` CHAR(1) NOT NULL,
  PRIMARY KEY (`cd_container`),
  INDEX `fk_container_tipo_container_idx` (`cd_tipo_container`),
  CONSTRAINT `fk_container_tipo_container`
    FOREIGN KEY (`cd_tipo_container`)
    REFERENCES `t_container`.`tb_tipo_container` (`cd_tipo_container`)
    );

CREATE TABLE IF NOT EXISTS `t_container`.`tb_tipo_movimentacao` (
  `cd_tipo_movimentacao` INT NOT NULL AUTO_INCREMENT,
  `nm_tipo_movimentacao` VARCHAR(45) NOT NULL,
  `sg_tipo_movimentacao` CHAR(4) NOT NULL,
  PRIMARY KEY (`cd_tipo_movimentacao`));

CREATE TABLE IF NOT EXISTS `t_container`.`tb_movimentacao` (
  `cd_movimentacao` INT NOT NULL AUTO_INCREMENT,
  `cd_container` INT NOT NULL,
  `cd_tipo_movimentacao` INT NOT NULL,
  `ic_status` CHAR(1), 
  `dt_inicio_movimentacao` DATETIME NOT NULL,
  `dt_fim_movimentacao` DATETIME NULL,
  PRIMARY KEY (`cd_movimentacao`),
  INDEX `fk_movimentacao_container_idx` (`cd_container`),
  INDEX `fk_movimentacao_tipo_movimentacao_idx` (`cd_tipo_movimentacao`),
  CONSTRAINT `fk_movimentacao_container`
    FOREIGN KEY (`cd_container`)
    REFERENCES `t_container`.`tb_container` (`cd_container`),
  CONSTRAINT `fk_movimentacao_tipo_movimentacao`
    FOREIGN KEY (`cd_tipo_movimentacao`)
    REFERENCES `t_container`.`tb_tipo_movimentacao` (`cd_tipo_movimentacao`));

INSERT INTO `tb_tipo_container` VALUES 
	(null, "DryBox - 20Ft", "DB20", "20ft" ),
	(null, "DryBox - 40Ft", "DB20", "40ft"), 
    (null, "Reefer - 20Ft", "RF20", "20ft" ), 
    (null, "Reefer - 40Ft", "RF40", "40ft" ), 
    (null, "Tanque", "TK20", "20ft" );

INSERT INTO `tb_tipo_movimentacao` VALUES 
	(null, "Embarque", "emba"),
	(null, "Descarga", "desc"),
	(null, "Gate In", "gtin"),
	(null, "Gate Out", "gtot"),
	(null, "Reposicionamento", "repo"),
	(null, "Pesagem", "pesa"),
	(null, "Scanner", "scan"); 

insert into tb_container values (null, "ABCD1234567","teste1",1,"c","e");
insert into tb_container values (null, "DCBA1234567","teste2",2,"v","1");

insert into tb_movimentacao values (null, 1,1,0,NOW(),null);
UPDATE tb_movimentacao SET ic_status = 1, dt_fim_movimentacao = now() WHERE cd_container =1 and ic_status = 0;

insert into tb_movimentacao values (null, 1, 2, 0, NOW(), null);
UPDATE tb_movimentacao SET ic_status = 1, dt_fim_movimentacao = now() WHERE cd_container =1 and ic_status = 0;

insert into tb_movimentacao values (null, 1, 3, 0, NOW(), null);
UPDATE tb_movimentacao SET ic_status = 1, dt_fim_movimentacao = now() WHERE cd_container =1 and ic_status = 0;

insert into tb_movimentacao values (null, 2, 3, 0, NOW(), null);

