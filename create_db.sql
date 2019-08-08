CREATE DATABASE IF NOT EXISTS db_note;

CREATE TABLE IF NOT EXISTS db_note.tb_note ( 
     last_updated TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
     title VARCHAR(32) NOT NULL ,
     author VARCHAR(32) NOT NULL ,
     note TEXT NULL DEFAULT NULL , 
     PRIMARY KEY (last_updated , title, author)
) 
