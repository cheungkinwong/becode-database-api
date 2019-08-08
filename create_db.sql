CREATE DATABASE database_note;
CREATE TABLE database_note.notes
(
     Titles VARCHAR(40) NOT NULL ,
     Author VARCHAR(40) NOT NULL ,
     Notes TEXT NULL DEFAULT NULL ,
     Dates TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
     PRIMARY KEY (Titles)
) 
