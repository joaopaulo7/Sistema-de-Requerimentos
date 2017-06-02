-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Local`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Local` (
  `idLocal` INT NOT NULL,
  `nome` TEXT NULL,
  `rua` TEXT NULL,
  `numero` INT NULL,
  `bairro` TEXT NULL,
  `cidade` TEXT NULL,
  PRIMARY KEY (`idLocal`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`aluno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`aluno` (
  `idaluno` INT NOT NULL,
  `curso` INT NULL,
  `nome` VARCHAR(150) NULL,
  PRIMARY KEY (`idaluno`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`curso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`curso` (
  `idcurso` INT NOT NULL,
  `nome_curso` VARCHAR(45) NULL,
  PRIMARY KEY (`idcurso`),
  CONSTRAINT `fk_curso_1`
    FOREIGN KEY (`idcurso`)
    REFERENCES `mydb`.`aluno` (`idaluno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`FormularioVisita`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`FormularioVisita` (
  `idFormulario` INT NOT NULL,
  `proponente_da_viagem` TEXT NULL,
  `tipo_visita` TEXT NULL,
  `idLocal` INT NULL,
  `data` DATE NULL,
  `transporte` TEXT NULL,
  `horario_saida` TIME NULL,
  `horario_chegada` TIME NULL,
  `local_chegada` TEXT NULL,
  `local_saida` TEXT NULL,
  `justificativa` TEXT NULL,
  `objetivo_geral` TEXT NULL,
  `objetivo_especifico` TEXT NULL,
  `descricao` TEXT NULL,
  `avaliacao` TEXT NULL,
  `data_preenchimento` DATE NULL,
  `user` INT NULL,
  PRIMARY KEY (`idFormulario`),
  INDEX `_idx` (`idLocal` ASC),
  INDEX `fk_FormularioVisita_1_idx` (`user` ASC),
  CONSTRAINT `fk_Formulario_1`
    FOREIGN KEY (`idLocal`)
    REFERENCES `mydb`.`Local` (`idLocal`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_FormularioVisita_1`
    FOREIGN KEY (`user`)
    REFERENCES `mydb`.`curso` (`idcurso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Pessoa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Pessoa` (
  `cadastro_identificador` INT NOT NULL,
  `nome` TEXT NULL,
  `departamento` TEXT NULL,
  `funcao` INT NULL,
  `email` TEXT NULL,
  `confirmacao` TINYINT(1) NULL,
  PRIMARY KEY (`cadastro_identificador`),
  CONSTRAINT `fk_Pessoa_1`
    FOREIGN KEY (`cadastro_identificador`)
    REFERENCES `mydb`.`FormularioVisita` (`user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
INSERT_METHOD = NO
PACK_KEYS = DEFAULT
ROW_FORMAT = DEFAULT
KEY_BLOCK_SIZE = 1;



-- -----------------------------------------------------
-- Table `mydb`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Usuario` (
  `idUsuario` INT NOT NULL,
  `login` INT NULL,
  `senha` TEXT NULL,
  PRIMARY KEY (`idUsuario`),
  INDEX `fk_Usuario_1_idx` (`login` ASC),
  CONSTRAINT `fk_Usuario_1`
    FOREIGN KEY (`login`)
    REFERENCES `mydb`.`Pessoa` (`cadastro_identificador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Materia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Materia` (
  `idMateria` INT NOT NULL,
  `nome` TEXT NULL COMMENT '					',
  `professor` TEXT NULL,
  PRIMARY KEY (`idMateria`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`FormularioSubs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`FormularioSubs` (
  `idFormularioSubs` INT NOT NULL,
  `motivo` TEXT NULL,
  `materia` INT NULL,
  `materia_substituto` INT NULL,
  `curso` TEXT NULL,
  `ano` INT NULL,
  `data_da_substituicao` DATE NULL,
  `horario_substituicao` TIME NULL,
  `pessoa` INT NULL,
  PRIMARY KEY (`idFormularioSubs`),
  INDEX `fk_FormularioSubs_1_idx` (`pessoa` ASC),
  INDEX `fk_FormularioSubs_2_idx` (`materia` ASC),
  INDEX `fk_FormularioSubs_3_idx` (`materia_substituto` ASC),
  CONSTRAINT `fk_FormularioSubs_1`
    FOREIGN KEY (`pessoa`)
    REFERENCES `mydb`.`Pessoa` (`cadastro_identificador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_FormularioSubs_2`
    FOREIGN KEY (`materia`)
    REFERENCES `mydb`.`Materia` (`idMateria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_FormularioSubs_3`
    FOREIGN KEY (`materia_substituto`)
    REFERENCES `mydb`.`Materia` (`idMateria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
