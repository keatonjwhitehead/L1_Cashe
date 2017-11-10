#Started by Jason Lubrano
#30 October 2017

CREATE TABLE User
(
id int PRIMARY KEY, #number automatically assigned to each user
username varchar(20) NOT NULL, #username
password varchar(20) NOT NULL, #password given to each user
passworddigest varchar(20) NOT NULL, #look back at it
points int CHECK (points > 0), #always have positive points called a <<check constraint>> btw
CONSTRAINT unique_user UNIQUE (username) #users cant have the same username
);

CREATE TABLE Hints
(
id int PRIMARY KEY,
hintname varchar(20) NOT NULL,
locat_lat int NOT NULL,
locat_long int NOT NULL,
points int CHECK (points > 0),
user_id_creator int REFERENCES User (id),
treasure_id int REFERENCES Treasure (id),
CONSTRAINT unique_hint UNIQUE (hintname)	
);

CREATE TABLE Treasure
(
id int PRIMARY KEY,
treasurename varchar(20) NOT NULL,
locat_long int NOT NULL,
locat_lat int NOT NULL,
points int CHECK (points > 0),
user_id_creator int REFERENCES User (id),
CONSTRAINT unique_treasure UNIQUE (treasurename)
);

CREATE TABLE History
(
	id int PRIMARY KEY,
	user_id_solver REFERENCES User (id),
	treasure_id int REFERENCES Treasure (id),
	hint_id int REFERENCES Hint (id)
)