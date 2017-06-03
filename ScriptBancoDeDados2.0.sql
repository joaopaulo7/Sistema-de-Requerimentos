-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema blog
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema blog
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `blog` DEFAULT CHARACTER SET utf8 ;
USE `blog` ;

-- -----------------------------------------------------
-- Table `blog`.`Pessoa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `blog`.`Pessoa` (
  `cadastro_identificador` BIGINT NOT NULL,
  `nome` TEXT NULL,
  `departamento` TEXT NULL,
  `funcao` INT NULL,
  `email` TEXT NULL,
  `confirmacao` TINYINT(1) NULL,
  PRIMARY KEY (`cadastro_identificador`))
ENGINE = InnoDB
INSERT_METHOD = NO
PACK_KEYS = DEFAULT
ROW_FORMAT = DEFAULT
KEY_BLOCK_SIZE = 1;


-- -----------------------------------------------------
-- Table `blog`.`Local`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `blog`.`Local` (
  `idLocal` INT NOT NULL,
  `nome` TEXT NULL,
  `rua` TEXT NULL,
  `numero` INT NULL,
  `bairro` TEXT NULL,
  `cidade` TEXT NULL,
  PRIMARY KEY (`idLocal`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blog`.`FormularioVisita`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `blog`.`FormularioVisita` (
  `idFormulario` INT NOT NULL,
  `proponente_da_viagem` BIGINT NULL,
  `conf_coordenador` BIGINT NULL,
  `conf_diretor` BIGINT NULL,
  `idLocal` INT NULL,
  `tipo_visita` TEXT NULL,
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
  PRIMARY KEY (`idFormulario`),
  INDEX `_idx` (`idLocal` ASC),
  INDEX `fk_FormularioVisita_propoente_idx` (`proponente_da_viagem` ASC),
  INDEX `fk_FormularioVisita_coordenador_idx` (`conf_coordenador` ASC),
  INDEX `fk_FormularioVisita_diretor_idx` (`conf_diretor` ASC),
  CONSTRAINT `fk_FormularioVisita_local`
    FOREIGN KEY (`idLocal`)
    REFERENCES `blog`.`Local` (`idLocal`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_FormularioVisita_propoente`
    FOREIGN KEY (`proponente_da_viagem`)
    REFERENCES `blog`.`Pessoa` (`cadastro_identificador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_FormularioVisita_coordenador`
    FOREIGN KEY (`conf_coordenador`)
    REFERENCES `blog`.`Pessoa` (`cadastro_identificador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_FormularioVisita_diretor`
    FOREIGN KEY (`conf_diretor`)
    REFERENCES `blog`.`Pessoa` (`cadastro_identificador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blog`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `blog`.`Usuario` (
  `idUsuario` INT NOT NULL,
  `login` BIGINT NULL,
  `senha` TEXT NULL,
  PRIMARY KEY (`idUsuario`),
  INDEX `fk_Usuario_1_idx` (`login` ASC),
  CONSTRAINT `fk_Usuario_1`
    FOREIGN KEY (`login`)
    REFERENCES `blog`.`Pessoa` (`cadastro_identificador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blog`.`Materia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `blog`.`Materia` (
  `idMateria` INT NOT NULL,
  `professor` BIGINT NULL,
  `nome` TEXT NULL COMMENT '					',
  `ano` TINYINT NULL,
  `curso` VARCHAR(45) NULL,
  PRIMARY KEY (`idMateria`),
  INDEX `fk_Materia_professor_idx` (`professor` ASC),
  CONSTRAINT `fk_Materia_professor`
    FOREIGN KEY (`professor`)
    REFERENCES `blog`.`Pessoa` (`cadastro_identificador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blog`.`FormularioSubs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `blog`.`FormularioSubs` (
  `idFormularioSubs` INT NOT NULL,
  `professor_substituto` BIGINT NULL,
  `materia` INT NULL,
  `motivo` TEXT NULL,
  `data_da_substituicao` DATE NULL,
  `horario_substituicao` TIME NULL,
  PRIMARY KEY (`idFormularioSubs`),
  INDEX `fk_FormularioSubs_1_idx` (`professor_substituto` ASC),
  INDEX `fk_FormularioSubs_2_idx` (`materia` ASC),
  CONSTRAINT `fk_FormularioSubs_1`
    FOREIGN KEY (`professor_substituto`)
    REFERENCES `blog`.`Pessoa` (`cadastro_identificador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_FormularioSubs_2`
    FOREIGN KEY (`materia`)
    REFERENCES `blog`.`Materia` (`idMateria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
