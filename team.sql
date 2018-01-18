CREATE DATABASE IF NOT EXISTS team;
USE team;

CREATE TABLE pInfo(
	playerID SMALLINT AUTO_INCREMENT,
    jNum DECIMAL(2,0),
	fName VARCHAR(255),
    lName VARCHAR(255),
    dob VARCHAR(255),
    class VARCHAR(255),
    pos VARCHAR(255),
    height DECIMAL(3,1),
    reach DECIMAL(4,1),
    
    CONSTRAINT PRIMARY KEY(playerID)
    
);

CREATE INDEX pInfo_fName_ix ON pInfo(fName);
CREATE INDEX pInfo_lName_ix ON pInfo(lName);

INSERT INTO pInfo (jNum, fName, lName, dob, class, pos,height, reach) VALUES
(6, "Julian", "Moses", "1995-08-29", "rjun","oh",76,96);
INSERT INTO pInfo (jNum, fName, lName, dob, class, pos,height, reach) VALUES
(1, "Jake", "Walenga", "1995-08-26", "rjun","oh",73,90);
INSERT INTO pInfo (jNum, fName, lName, dob, class, pos,height, reach) VALUES
(10, "Mitch", "Perinar", "1995-12-12", "rjun","opp",79,103);

/*
CREATE TABLE contact(
	playerID SMALLINT,
	contactID SMALLINT AUTO_INCREMENT,
	fName VARCHAR(255),
	lName VARCHAR(255),
	address VARCHAR(255),
	city VARCHAR(255),
	state VARCHAR(255),
	zip DECIMAL (5,0),
	phone VARCHAR(10),
	email VARCHAR(255),

	CONSTRAINT PRIMARY KEY(contactID),
	CONSTRAINT info_fk_contact FOREIGN KEY(playerID)
        REFERENCES pInfo(playerID)
);

CREATE INDEX contact_fName_ix ON contact(fName);
CREATE INDEX contact_lName_ix ON contact(lName);
Removed because of additional complexity, and little value added to application.
After further speaking to my coaches I realized that this would need its own
separate application. 
*/

CREATE TABLE stats(
	playerID SMALLINT,
    pracDate DATE,
    kils DECIMAL(3,0),
    err DECIMAL(3,0),
    attempts DECIMAL(3,0),
    blocks DECIMAL(3,0),
    aces DECIMAL(3,0),
    passRate DECIMAL (2,1),
    assists DECIMAL(3,0),
    
    CONSTRAINT PRIMARY KEY(playerID, pracDate),
    CONSTRAINT info_fk_stats FOREIGN KEY(playerID)
        REFERENCES pInfo(playerID)
);

INSERT INTO stats VALUES (1,"2017-12-12",5,1,7,2,2,3.4,2);
INSERT INTO stats VALUES(2,"2017-12-12",2,2,6,2,3,3.4,1);
INSERT INTO stats VALUES(3,"2017-12-12",7,2,14,2,1,3.4,4);



CREATE TABLE phys(
	playerID SMALLINT,
    testNum TINYINT,
    blockTouch SMALLINT,
    approach SMALLINT,
    CONSTRAINT PRIMARY KEY(playerID, testNum),
    CONSTRAINT info_fk_phys FOREIGN KEY(playerID)
        REFERENCES pInfo(playerID)
);

INSERT INTO phys VALUES(1,1,127,137);
INSERT INTO phys VALUES(2,1,119,127);
INSERT INTO phys VALUES(3,1,125,137);

/*CREATE TABLE class(
	classNum DECIMAL(1,0) PRIMARY KEY,
    class VARCHAR(255)
);

CREATE INDEX pos_class_ix ON class(class);


CREATE TABLE pos(
	posNum DECIMAL(1,0) PRIMARY KEY,
    pos VARCHAR(255)
);

CREATE INDEX pos_pos_ix ON pos(pos);*/