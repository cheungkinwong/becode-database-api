CREATE DATABASE IF NOT EXISTS `database note`;

CREATE TABLE IF NOT EXISTS `database note`.`notes` ( 
     `Last updated` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
     `Title` VARCHAR(20) NOT NULL ,
     `Author` VARCHAR(20) NOT NULL ,
     `Notes` TEXT NULL DEFAULT NULL , 
     PRIMARY KEY (`Last updated` , `Titles`, `Author`)
) 
