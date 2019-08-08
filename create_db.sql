CREATE DATABASE IF NOT EXISTS `database_note`;

CREATE TABLE IF NOT EXISTS `database_note`.`notes` ( 
     `Dates` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
     `Titles` VARCHAR(40) NOT NULL ,
     `Author` VARCHAR(40) NOT NULL ,
     `Notes` TEXT NULL DEFAULT NULL , 
     PRIMARY KEY (`Titles`)
) 
COLLATE='utf8_general_ci'
ENGINE = InnoDB;