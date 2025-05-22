-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(45) NOT NULL,
  `nome_completo` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  `data_nasc` DATE NULL,
  `telefone` VARCHAR(45) NULL,
  `tipo` ENUM('ADMIN', 'USUARIO') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `senha_UNIQUE` (`senha` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`cidades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`cidades` (
  `id` INT NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `estado_sigla` VARCHAR(2) NOT NULL,
  `estado_nome` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`pontos_turisticos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`pontos_turisticos` (
  `id` INT NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `endereco` VARCHAR(45) NOT NULL,
  `cidades_id` INT NOT NULL,
  `descricao` VARCHAR(500) NOT NULL,
  `imagem` VARCHAR(255) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_pontos_turisticos_cidades_idx` (`cidades_id` ASC) VISIBLE,
  CONSTRAINT `fk_pontos_turisticos_cidades`
    FOREIGN KEY (`cidades_id`)
    REFERENCES `mydb`.`cidades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`noticias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`noticias` (
  `id` INT NOT NULL,
  `titulo` VARCHAR(45) NOT NULL,
  `texto` VARCHAR(1000) NOT NULL,
  `data` DATE NOT NULL,
  `pontos_turisticos_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_noticias_pontos_turisticos1_idx` (`pontos_turisticos_id` ASC) VISIBLE,
  CONSTRAINT `fk_noticias_pontos_turisticos1`
    FOREIGN KEY (`pontos_turisticos_id`)
    REFERENCES `mydb`.`pontos_turisticos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`avaliações`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`avaliações` (
  `id` INT NOT NULL,
  `nota` ENUM("1", "2", "3", "4", "5") NOT NULL,
  `comentario` VARCHAR(500) NULL,
  `pontos_turisticos_id` INT NOT NULL,
  `usuarios_id` INT NOT NULL,
  `data` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_avaliações_pontos_turisticos1_idx` (`pontos_turisticos_id` ASC) VISIBLE,
  INDEX `fk_avaliações_usuarios1_idx` (`usuarios_id` ASC) VISIBLE,
  CONSTRAINT `fk_avaliações_pontos_turisticos1`
    FOREIGN KEY (`pontos_turisticos_id`)
    REFERENCES `mydb`.`pontos_turisticos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_avaliações_usuarios1`
    FOREIGN KEY (`usuarios_id`)
    REFERENCES `mydb`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
