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
  `nome` VARCHAR(45) NULL,
  `area` VARCHAR(20) NULL,
  `funcao` VARCHAR(20) NULL,
  `email` VARCHAR(129) NULL,
  `confirmacao_email` TINYINT(1) NULL,
  `confirmacao_entrada` TINYINT(1) NULL,
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
  `nome` VARCHAR(45) NULL,
  `rua` VARCHAR(45) NULL,
  `numero` INT NULL,
  `bairro` VARCHAR(45) NULL,
  `cidade` VARCHAR(45) NULL,
  PRIMARY KEY (`idLocal`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blog`.`FormularioVisita`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `blog`.`FormularioVisita` (
  `idFormulario` INT NOT NULL,
  `proponente_da_viagem` BIGINT NULL,
  `corrdenador_req` BIGINT NULL,
  `coordenador` BIGINT NULL,
  `diretor_req` BIGINT NULL,
  `diretor` BIGINT NULL,
  `local` INT NULL,
  `tipo_visita` VARCHAR(20) NULL,
  `data` DATE NULL,
  `transporte` VARCHAR(30) NULL,
  `horario_saida` TIME NULL,
  `horario_chegada` TIME NULL,
  `local_chegada` VARCHAR(100) NULL,
  `local_saida` VARCHAR(100) NULL,
  `justificativa` TEXT NULL,
  `objetivo_geral` VARCHAR(100) NULL,
  `objetivo_especifico` VARCHAR(100) NULL,
  `descricao` TEXT NULL,
  `avaliacao` VARCHAR(45) NULL,
  `data_preenchimento` DATE NULL,
  PRIMARY KEY (`idFormulario`),
  INDEX `_idx` (`local` ASC),
  INDEX `fk_FormularioVisita_propoente_idx` (`proponente_da_viagem` ASC),
  INDEX `fk_FormularioVisita_coordenador_idx` (`coordenador` ASC),
  INDEX `fk_FormularioVisita_diretor_idx` (`diretor` ASC),
  INDEX `fk_FormularioVisita_1_idx` (`corrdenador_req` ASC),
  INDEX `fk_FormularioVisita_2_idx` (`diretor_req` ASC),
  CONSTRAINT `fk_FormularioVisita_local`
    FOREIGN KEY (`local`)
    REFERENCES `blog`.`Local` (`idLocal`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_FormularioVisita_propoente`
    FOREIGN KEY (`proponente_da_viagem`)
    REFERENCES `blog`.`Pessoa` (`cadastro_identificador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_FormularioVisita_coordenador`
    FOREIGN KEY (`coordenador`)
    REFERENCES `blog`.`Pessoa` (`cadastro_identificador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_FormularioVisita_diretor`
    FOREIGN KEY (`diretor`)
    REFERENCES `blog`.`Pessoa` (`cadastro_identificador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_FormularioVisita_coordenador_req`
    FOREIGN KEY (`corrdenador_req`)
    REFERENCES `blog`.`Pessoa` (`cadastro_identificador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_FormularioVisita_diretor_req`
    FOREIGN KEY (`diretor_req`)
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
  `senha` VARCHAR(64) NULL,
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
  `nome` VARCHAR(100) NULL COMMENT '					',
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
  `professor_substituto_req` BIGINT NULL,
  `professor_substituto` BIGINT NULL,
  `coordenador_req` BIGINT NULL,
  `coordenador` BIGINT NULL,
  `materia` INT NULL,
  `motivo` TEXT NULL,
  `data_da_substituicao` DATE NULL,
  `horario_substituicao` TIME NULL,
  PRIMARY KEY (`idFormularioSubs`),
  INDEX `fk_FormularioSubs_1_idx` (`professor_substituto` ASC),
  INDEX `fk_FormularioSubs_2_idx` (`materia` ASC),
  INDEX `fk_FormularioSubs_3_idx` (`coordenador` ASC),
  INDEX `fk_FormularioSubs_4_idx` (`professor_substituto_req` ASC),
  INDEX `fk_FormularioSubs_5_idx` (`coordenador_req` ASC),
  CONSTRAINT `fk_FormularioSubs_professor_substituto`
    FOREIGN KEY (`professor_substituto`)
    REFERENCES `blog`.`Pessoa` (`cadastro_identificador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_FormularioSubs_materia`
    FOREIGN KEY (`materia`)
    REFERENCES `blog`.`Materia` (`idMateria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_FormularioSubs_coordenador`
    FOREIGN KEY (`coordenador`)
    REFERENCES `blog`.`Pessoa` (`cadastro_identificador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_FormularioSubs_professor_substituto_req`
    FOREIGN KEY (`professor_substituto_req`)
    REFERENCES `blog`.`Pessoa` (`cadastro_identificador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_FormularioSubs_coordenador_req`
    FOREIGN KEY (`coordenador_req`)
    REFERENCES `blog`.`Pessoa` (`cadastro_identificador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blog`.`Diretor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `blog`.`Diretor` (
  `iddiretor` BIGINT NOT NULL,
  PRIMARY KEY (`iddiretor`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blog`.`Coordenador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `blog`.`Coordenador` (
  `idCoordenador` BIGINT NOT NULL,
  `area` VARCHAR(20) NULL,
  PRIMARY KEY (`idCoordenador`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
