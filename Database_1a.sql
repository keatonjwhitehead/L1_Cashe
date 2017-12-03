#Started by Jason Lubrano
#30 October 2017

DROP database IF EXISTS heroku_94dcaf97d2ccea3;
CREATE database heroku_94dcaf97d2ccea3;
CREATE TABLE User (
	id int PRIMARY KEY, #number automatically assigned to each user
	username varchar(100) NOT NULL, #username
	password varchar(100) NOT NULL, #password given to each user
	points int CHECK (points > 0), #always have positive points called a <<check constraint>> btw
	CONSTRAINT unique_user UNIQUE (username) #users cant have the same username
);

CREATE TABLE Hint (
	id int NOT NULL auto_increment PRIMARY KEY,
	hintname varchar(100) NOT NULL,
	locat_lat double NOT NULL,
	locat_long double NOT NULL,
	points int CHECK (points > 0),
	creator_username varchar(100) NOT NULL,
	next_hint int,
	next_hint_desc varchar(100),
	-- This needs to be more than 100 characters
	question varchar(100),
	-- this needs to be more than 100 characters
	answer varchar(100),
	treasure_id int REFERENCES Treasure (id),
	CONSTRAINT unique_hint UNIQUE (hintname)
);

CREATE TABLE Treasure (
	id int NOT NULL auto_increment PRIMARY KEY,
	-- the following needs to be more than 100 characters
	question varchar(100),
	answer varchar(100),
	treasurename varchar(100) NOT NULL,
	locat_long double NOT NULL,
	locat_lat double NOT NULL,
	points int CHECK (points > 0),
	creator_username varchar(100) NOT NULL,
	solver_username varchar(100)
);

CREATE TABLE History (
	id int PRIMARY KEY,
	solver_username varchar(100),
	treasure_id int REFERENCES Treasure (id),
	hint_id int REFERENCES Hint (id)
);
