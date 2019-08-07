<?php
$config = require 'config.php';

$sql = "CREATE DATABASE `database`;
        CREATE TABLE `notes` (
        `Titel` TEXT NULL DEFAULT NULL ,
        `Date` TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
        `Message` TEXT NULL DEFAULT NULL
)";
query($sql);

?>