-- MySQL Script generated by MySQL Workbench
-- 12/04/14 10:47:13
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema Welchome
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema Welchome
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Welchome` DEFAULT CHARACTER SET utf8 ;
USE `Welchome` ;

-- -----------------------------------------------------
-- Table `Welchome`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Welchome`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `signup_date` INT NOT NULL,
  `avatar` LONGTEXT NOT NULL,
  `logement_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `logement_id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `Welchome`.`commentaires`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Welchome`.`commentaires` (
  `id_commentaire` INT(11) NOT NULL AUTO_INCREMENT,
  `date` DATE NOT NULL,
  `id_user` INT(11) NOT NULL,
  `users_id` INT NOT NULL,
  `commentaire` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id_commentaire`),
  INDEX `fk_commentaires_users_idx` (`users_id` ASC),
  CONSTRAINT `fk_commentaires_users`
    FOREIGN KEY (`users_id`)
    REFERENCES `Welchome`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `Welchome`.`contrainte`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Welchome`.`contrainte` (
  `id_contrainte` INT(11) NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(255) NOT NULL,
  `description` TEXT NOT NULL,
  PRIMARY KEY (`id_contrainte`))
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = ucs2
COLLATE = ucs2_general_ci;


-- -----------------------------------------------------
-- Table `Welchome`.`favoris`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Welchome`.`favoris` (
  `id_fav` INT(11) NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(255) NOT NULL,
  `users_id` INT NOT NULL,
  PRIMARY KEY (`id_fav`),
  INDEX `fk_favoris_users1_idx` (`users_id` ASC),
  CONSTRAINT `fk_favoris_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `Welchome`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `Welchome`.`logement`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Welchome`.`logement` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `Localisation` TEXT NOT NULL,
  `Nombre de voyageurs` INT(11) NOT NULL,
  `Type de logement` TEXT NOT NULL,
  `Description` TEXT NOT NULL,
  `date` VARCHAR(255) NOT NULL,
  `photo1` VARCHAR(255) NOT NULL,
  `photo2` VARCHAR(255) NOT NULL,
  `photo3` VARCHAR(255) NOT NULL,
  `photo4` VARCHAR(255) NOT NULL,
  `photo5` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `Welchome`.`services`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Welchome`.`services` (
  `id_service` INT(11) NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(255) NOT NULL,
  `description` TEXT NOT NULL,
  PRIMARY KEY (`id_service`))
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `Welchome`.`logement_has_services`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Welchome`.`logement_has_services` (
  `logement_id` INT(11) NOT NULL,
  `services_id_service` INT(11) NOT NULL,
  PRIMARY KEY (`logement_id`, `services_id_service`),
  INDEX `fk_logement_has_services_services1_idx` (`services_id_service` ASC),
  INDEX `fk_logement_has_services_logement1_idx` (`logement_id` ASC),
  CONSTRAINT `fk_logement_has_services_logement1`
    FOREIGN KEY (`logement_id`)
    REFERENCES `Welchome`.`logement` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_logement_has_services_services1`
    FOREIGN KEY (`services_id_service`)
    REFERENCES `Welchome`.`services` (`id_service`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `Welchome`.`logement_has_contrainte`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Welchome`.`logement_has_contrainte` (
  `logement_id` INT(11) NOT NULL,
  `contrainte_id_contrainte` INT(11) NOT NULL,
  PRIMARY KEY (`logement_id`, `contrainte_id_contrainte`),
  INDEX `fk_logement_has_contrainte_contrainte1_idx` (`contrainte_id_contrainte` ASC),
  INDEX `fk_logement_has_contrainte_logement1_idx` (`logement_id` ASC),
  CONSTRAINT `fk_logement_has_contrainte_logement1`
    FOREIGN KEY (`logement_id`)
    REFERENCES `Welchome`.`logement` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_logement_has_contrainte_contrainte1`
    FOREIGN KEY (`contrainte_id_contrainte`)
    REFERENCES `Welchome`.`contrainte` (`id_contrainte`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `Welchome`.`user_has_voeux`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Welchome`.`user_has_voeux` (
  `id_voeu` INT NOT NULL AUTO_INCREMENT,
  `users_id` INT NOT NULL,
  `users_logement_id` INT(11) NOT NULL,
  `users_id1` INT NOT NULL,
  `users_logement_id1` INT(11) NOT NULL,
  PRIMARY KEY (`id_voeu`),
  INDEX `fk_users_has_users_users2_idx` (`users_id1` ASC, `users_logement_id1` ASC),
  INDEX `fk_users_has_users_users1_idx` (`users_id` ASC, `users_logement_id` ASC),
  CONSTRAINT `fk_users_has_users_users1`
    FOREIGN KEY (`users_id` , `users_logement_id`)
    REFERENCES `Welchome`.`users` (`id` , `logement_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_users_users2`
    FOREIGN KEY (`users_id1` , `users_logement_id1`)
    REFERENCES `Welchome`.`users` (`id` , `logement_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `Welchome`.`media`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Welchome`.`media` (
  `id_media` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(255) NOT NULL,
  `url` VARCHAR(255) NOT NULL,
  `users_id` INT NOT NULL,
  `users_logement_id` INT(11) NOT NULL,
  PRIMARY KEY (`id_media`),
  INDEX `fk_media_users1_idx` (`users_id` ASC, `users_logement_id` ASC),
  CONSTRAINT `fk_media_users1`
    FOREIGN KEY (`users_id` , `users_logement_id`)
    REFERENCES `Welchome`.`users` (`id` , `logement_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `Welchome`.`users_has_logement`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Welchome`.`users_has_logement` (
  `users_id` INT NOT NULL,
  `users_logement_id` INT(11) NOT NULL,
  `logement_id` INT(11) NOT NULL,
  PRIMARY KEY (`users_id`, `users_logement_id`, `logement_id`),
  INDEX `fk_users_has_logement_logement1_idx` (`logement_id` ASC),
  INDEX `fk_users_has_logement_users1_idx` (`users_id` ASC, `users_logement_id` ASC),
  CONSTRAINT `fk_users_has_logement_users1`
    FOREIGN KEY (`users_id` , `users_logement_id`)
    REFERENCES `Welchome`.`users` (`id` , `logement_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_logement_logement1`
    FOREIGN KEY (`logement_id`)
    REFERENCES `Welchome`.`logement` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
