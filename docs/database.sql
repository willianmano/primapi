-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema rmmapi
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema rmmapi
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `rmmapi` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `rmmapi` ;

-- -----------------------------------------------------
-- Table `rmmapi`.`prima`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rmmapi`.`prima` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '	',
  `nome` VARCHAR(100) NOT NULL,
  `site` VARCHAR(100) NULL,
  `cidade` VARCHAR(45) NULL,
  `estado` CHAR(2) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rmmapi`.`empresa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rmmapi`.`empresa` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rmmapi`.`agenda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rmmapi`.`agenda` (
  `id` INT NOT NULL,
  `prima_id` INT NOT NULL,
  `empresa_id` INT NOT NULL,
  `dia_semana` ENUM('seg','ter','qua','qui','sex') NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_agenda_prima_idx` (`prima_id` ASC),
  INDEX `fk_agenda_empresa1_idx` (`empresa_id` ASC),
  CONSTRAINT `fk_agenda_prima`
    FOREIGN KEY (`prima_id`)
    REFERENCES `rmmapi`.`prima` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_agenda_empresa1`
    FOREIGN KEY (`empresa_id`)
    REFERENCES `rmmapi`.`empresa` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
