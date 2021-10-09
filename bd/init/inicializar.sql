-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema Escrito
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema Escrito

-- -----------------------------------------------------


use Escrito;
-- -----------------------------------------------------
-- Table `Escrito`.`Souvenirs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Escrito`.`Souvenirs` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(20) NOT NULL,
  `descripcion` VARCHAR(20) NOT NULL,
  `stock` INT(11) NOT NULL,
  `precio` INT(11) NOT NULL,
  `fechaAlta` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `Escrito`.`Compras`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Escrito`.`Compras` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `fechaCompra` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `idSouvenir` INT(11) NULL DEFAULT NULL,
  `cantidad` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `idSouvenir` (`idSouvenir` ASC),
  CONSTRAINT `compras_ibfk_1`
    FOREIGN KEY (`idSouvenir`)
    REFERENCES `Escrito`.`Souvenirs` (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `Escrito`.`Usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Escrito`.`Usuarios` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `ci` VARCHAR(8) NULL DEFAULT NULL,
  `nombre` VARCHAR(20) NULL DEFAULT NULL,
  `password` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


USE `Escrito` ;

-- -----------------------------------------------------
-- procedure Comprar()
-- -----------------------------------------------------

DELIMITER $$
USE `Escrito`$$
CREATE DEFINER=`root`@`%` PROCEDURE `Comprar()`(ids int , cant int , disponibles int)
BEGIN
INSERT INTO Compras (idSouvenir,cantidad) VALUES (ids,cant);
UPDATE Souvenirs set stock = disponibles where id=ids;

END$$

DELIMITER ;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
