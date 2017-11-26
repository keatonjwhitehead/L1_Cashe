#Started by Jason Lubrano
#30 October 2017

CREATE TABLE User (
	id int PRIMARY KEY, #number automatically assigned to each user
	username varchar(100) NOT NULL, #username
	password varchar(100) NOT NULL, #password given to each user
	points int CHECK (points > 0), #always have positive points called a <<check constraint>> btw
	CONSTRAINT unique_user UNIQUE (username) #users cant have the same username
);

CREATE TABLE Hint (
	id int PRIMARY KEY,
	hintname varchar(100) NOT NULL,
	locat_lat double NOT NULL,
	locat_long double NOT NULL,
	points int CHECK (points > 0),
	creator_username varchar(100) NOT NULL,
	next_hint int,
	treasure_id int REFERENCES Treasure (id),
	CONSTRAINT unique_hint UNIQUE (hintname)
);

CREATE TABLE Treasure (
	id int NOT NULL auto_increment PRIMARY KEY,
	treasurename varchar(100) NOT NULL,
	locat_long double NOT NULL,
	locat_lat double NOT NULL,
	points int CHECK (points > 0),
	creator_username varchar(100) NOT NULL,
	solver_username varchar(100),
	CONSTRAINT unique_treasure UNIQUE (treasurename)
);

CREATE TABLE History (
	id int PRIMARY KEY,
	user_id_solver int REFERENCES User (id),
	treasure_id int REFERENCES Treasure (id),
	hint_id int REFERENCES Hint (id)
);
