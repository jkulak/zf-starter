SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `starter` DEFAULT CHARACTER SET utf8 COLLATE utf8_polish_ci ;
USE `starter` ;

-- -----------------------------------------------------
-- Table `starter`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `starter`.`users` ;

CREATE  TABLE IF NOT EXISTS `starter`.`users` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `login` VARCHAR(45) NOT NULL ,
  `password` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) ,
  UNIQUE INDEX `login_UNIQUE` (`login` ASC) ,
  INDEX `login_index` (`login` ASC) )
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
