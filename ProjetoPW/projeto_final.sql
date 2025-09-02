CREATE SCHEMA IF NOT EXISTS `projeto_final` DEFAULT CHARACTER SET latin1;

USE `projeto_final`;

CREATE TABLE IF NOT EXISTS `usuario` (
    `idusuario` INT(11) NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(1500) NULL DEFAULT NULL,
    `cpf` VARCHAR(11) NOT NULL,
    `dataNascimento` DATE NULL DEFAULT NULL,
    `email` VARCHAR(150) NULL DEFAULT NULL,
    `senha` VARCHAR(45) NULL DEFAULT NULL,
    PRIMARY KEY (`idusuario`),
    UNIQUE INDEX `cpf_UNIQUE` (`cpf` ASC)
) ENGINE = InnoDB DEFAULT CHARACTER SET = latin1;

CREATE TABLE IF NOT EXISTS `formacaoAcademica` (
    `idformacaoAcademica` INT(11) NOT NULL AUTO_INCREMENT,
    `idusuario` INT(11) NOT NULL,
    `inicio` DATE NOT NULL,
    `fim` DATE DEFAULT NULL,
    `descricao` VARCHAR(150) DEFAULT NULL,
    PRIMARY KEY (`idformacaoAcademica`),
    INDEX `IDUSUARIO_idx` (`idusuario` ASC),
    CONSTRAINT `IDUSUARIO`
        FOREIGN KEY (`idusuario`)
        REFERENCES `usuario` (`idusuario`)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION
) ENGINE = InnoDB DEFAULT CHARACTER SET = latin1;
