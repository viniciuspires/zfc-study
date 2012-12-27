BEGIN TRANSACTION;
create table album ( name VARCHAR(50), description TEXT, year INTEGER(4), artist_id INTEGER );
CREATE TABLE artist ( name VARCHAR(50), bio TEXT );
INSERT INTO artist VALUES('System Of A Down','A long time ago...');
INSERT INTO artist VALUES('Radiohead','Found Radiohead by...');
COMMIT;
