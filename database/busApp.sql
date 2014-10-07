SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- DROP SCHEMA IF EXISTS `csashesi_kingston-coker` ;
-- CREATE SCHEMA IF NOT EXISTS `csashesi_kingston-coker` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
-- USE `csashesi_kingston-coker` ;

-- -----------------------------------------------------
-- Table `csashesi_kingston-coker`.`role`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `csashesi_kingston-coker`.`role` ;

CREATE TABLE IF NOT EXISTS `csashesi_kingston-coker`.`role` (
  `role_id` INT NOT NULL AUTO_INCREMENT,
  `role_name` VARCHAR(35) NOT NULL,
  `date_created` DATETIME NOT NULL,
  `date_modified` DATETIME NOT NULL,
  PRIMARY KEY (`role_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `csashesi_kingston-coker`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `csashesi_kingston-coker`.`user` ;

CREATE TABLE IF NOT EXISTS `csashesi_kingston-coker`.`user` (
  `user_id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `date_created` DATETIME NOT NULL,
  `date_modified` DATETIME NOT NULL,
  `role_role_id` INT NOT NULL,
  PRIMARY KEY (`user_id`),
  INDEX `fk_user_role_idx` (`role_role_id` ASC),
  CONSTRAINT `fk_user_role`
    FOREIGN KEY (`role_role_id`)
    REFERENCES `csashesi_kingston-coker`.`role` (`role_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `csashesi_kingston-coker`.`dropoff`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `csashesi_kingston-coker`.`dropoff` ;

CREATE TABLE IF NOT EXISTS `csashesi_kingston-coker`.`dropoff` (
  `dropoff_id` INT NOT NULL AUTO_INCREMENT,
  `dropoff_name` VARCHAR(45) NOT NULL,
  `dropoff_long` VARCHAR(45) NULL,
  `dropoff_lat` VARCHAR(45) NULL,
  `dropoff_time` TIME NULL,
  `date_created` DATETIME NOT NULL,
  `date_modified` DATETIME NOT NULL,
  PRIMARY KEY (`dropoff_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `csashesi_kingston-coker`.`info`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `csashesi_kingston-coker`.`info` ;

CREATE TABLE IF NOT EXISTS `csashesi_kingston-coker`.`info` (
  `info_id` INT NOT NULL AUTO_INCREMENT,
  `seatsLeft` INT NULL,
  `numOfSeats` INT NULL,
  `longitude` DECIMAL NULL,
  `numOfPssngrsReserved` INT NULL,
  `numOfPssngrsBus` INT NULL,
  `latitude` DECIMAL NULL,
  `locationAddress` VARCHAR(95) NULL,
  `date_created` DATETIME NULL,
  `date_modified` DATETIME NULL,
  PRIMARY KEY (`info_id`))
ENGINE = InnoDB;



-- -----------------------------------------------------
-- Table `csashesi_kingston-coker`.`reservation`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `csashesi_kingston-coker`.`reservation` ;

CREATE TABLE IF NOT EXISTS `csashesi_kingston-coker`.`reservation` (
  `reservation_id` INT NOT NULL AUTO_INCREMENT,
  `amount_due` DECIMAL(4,2) NULL,
  `reservation_date` DATETIME NULL,
  `date_created` DATETIME NOT NULL,
  `date_modified` DATETIME NOT NULL,
  `user_user_id` INT NOT NULL,
  `dropoff_dropoff_id` INT NOT NULL,
  PRIMARY KEY (`reservation_id`),
  INDEX `fk_reservation_user1_idx` (`user_user_id` ASC),
  INDEX `fk_reservation_dropoff1_idx` (`dropoff_dropoff_id` ASC),
  CONSTRAINT `fk_reservation_user1`
    FOREIGN KEY (`user_user_id`)
    REFERENCES `csashesi_kingston-coker`.`user` (`user_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reservation_dropoff1`
    FOREIGN KEY (`dropoff_dropoff_id`)
    REFERENCES `csashesi_kingston-coker`.`dropoff` (`dropoff_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Data for table `csashesi_kingston-coker`.`role`
-- -----------------------------------------------------
START TRANSACTION;
USE `csashesi_kingston-coker`;
INSERT INTO `csashesi_kingston-coker`.`role` (`role_id`, `role_name`, `date_created`, `date_modified`) VALUES (1, 'admin', now(), now());
INSERT INTO `csashesi_kingston-coker`.`role` (`role_id`, `role_name`, `date_created`, `date_modified`) VALUES (2, 'driver', now(), now());
INSERT INTO `csashesi_kingston-coker`.`role` (`role_id`, `role_name`, `date_created`, `date_modified`) VALUES (3, 'passenger', now(), now());

COMMIT;


-- -----------------------------------------------------
-- Data for table `csashesi_kingston-coker`.`user`
-- -----------------------------------------------------
START TRANSACTION;
USE `csashesi_kingston-coker`;
INSERT INTO `csashesi_kingston-coker`.`user` (`user_id`, `username`, `password`, `date_created`, `date_modified`, `role_role_id`) VALUES (1, 'del', '', now(), now(), 1);
INSERT INTO `csashesi_kingston-coker`.`user` (`user_id`, `username`, `password`, `date_created`, `date_modified`, `role_role_id`) VALUES (2, 'jud', '', now(), now(), 2);
INSERT INTO `csashesi_kingston-coker`.`user` (`user_id`, `username`, `password`, `date_created`, `date_modified`, `role_role_id`) VALUES (3, 'kor', '', now(), now(), 3);

COMMIT;


-- -----------------------------------------------------
-- Data for table `csashesi_kingston-coker`.`dropoff`
-- -----------------------------------------------------
START TRANSACTION;
USE `csashesi_kingston-coker`;
INSERT INTO `csashesi_kingston-coker`.`dropoff` (`dropoff_id`, `dropoff_name`, `dropoff_long`, `dropoff_lat`, `dropoff_time`, `date_created`, `date_modified`) VALUES (1, '37 Bus Stop', NULL, NULL, '7:05', now(), now());
INSERT INTO `csashesi_kingston-coker`.`dropoff` (`dropoff_id`, `dropoff_name`, `dropoff_long`, `dropoff_lat`, `dropoff_time`, `date_created`, `date_modified`) VALUES (2, 'Airport 2nd Stop', NULL, NULL, '7:10', now(), now());
INSERT INTO `csashesi_kingston-coker`.`dropoff` (`dropoff_id`, `dropoff_name`, `dropoff_long`, `dropoff_lat`, `dropoff_time`, `date_created`, `date_modified`) VALUES (3, 'Tetteh Quarshie', NULL, NULL, '7:15', now(), now());
INSERT INTO `csashesi_kingston-coker`.`dropoff` (`dropoff_id`, `dropoff_name`, `dropoff_long`, `dropoff_lat`, `dropoff_time`, `date_created`, `date_modified`) VALUES (4, 'Shiahie', NULL, NULL, '7:20', now(), now());
INSERT INTO `csashesi_kingston-coker`.`dropoff` (`dropoff_id`, `dropoff_name`, `dropoff_long`, `dropoff_lat`, `dropoff_time`, `date_created`, `date_modified`) VALUES (5, 'Okponglo', NULL, NULL, '7:25', now(), now());
INSERT INTO `csashesi_kingston-coker`.`dropoff` (`dropoff_id`, `dropoff_name`, `dropoff_long`, `dropoff_lat`, `dropoff_time`, `date_created`, `date_modified`) VALUES (6, 'Atomic Junction', NULL, NULL, '7:30', now(), now());
INSERT INTO `csashesi_kingston-coker`.`dropoff` (`dropoff_id`, `dropoff_name`, `dropoff_long`, `dropoff_lat`, `dropoff_time`, `date_created`, `date_modified`) VALUES (7, 'Wisconsin Junction', NULL, NULL, '7:35', now(), now());
INSERT INTO `csashesi_kingston-coker`.`dropoff` (`dropoff_id`, `dropoff_name`, `dropoff_long`, `dropoff_lat`, `dropoff_time`, `date_created`, `date_modified`) VALUES (8, 'Haatso Junction', NULL, NULL, '7:40', now(), now());
INSERT INTO `csashesi_kingston-coker`.`dropoff` (`dropoff_id`, `dropoff_name`, `dropoff_long`, `dropoff_lat`, `dropoff_time`, `date_created`, `date_modified`) VALUES (9, 'Atomic roundabout', NULL, NULL, '7:45', now(), now());
INSERT INTO `csashesi_kingston-coker`.`dropoff` (`dropoff_id`, `dropoff_name`, `dropoff_long`, `dropoff_lat`, `dropoff_time`, `date_created`, `date_modified`) VALUES (10, 'Abom Junction', NULL, NULL, '7:55', now(), now());

COMMIT;



-- -----------------------------------------------------
-- Data for table `csashesi_kingston-coker`.`info`
-- -----------------------------------------------------
START TRANSACTION;
USE `csashesi_kingston-coker`;
INSERT INTO `csashesi_kingston-coker`.`info` (`info_id`, `seatsLeft`, `numOfSeats`, `longitude`, `numOfPssngrsReserved`, `numOfPssngrsBus`, `latitude`, `locationAddress`, `date_created`, `date_modified`) VALUES (NULL, 10, 30, -0.220115, 10, 10, 5.759671, '\"University Ave Ghana\"', now(), now());

COMMIT;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
