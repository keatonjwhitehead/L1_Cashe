#Started by Jason Lubrano
#30 October 2017

CREATE TABLE User
(
id int PRIMARY KEY, #number automatically assigned to each user
username varchar(20), NOT NULL #username
password varchar(20), NOT NULL #password given to each user
passworddigest varchar(20), NOT NULL #look back at it
points int CHECK (points > 0), #always have positive points called a <<check constraint>> btw
CONSTRAINT unique_user UNIQUE (username) #users cant have the same username
);

CREATE TABLE Hints
(
id int PRIMARY KEY,
locat_lat int NOT NULL,
locat_long int NOT NULL,
points int CHECK (points > 0),
hint_name varchar(20) NOT NULL,
#id of trea
creator_user int REFERENCES User (id)
)

CREATE TABLE Treasure
(
id int PRIMARY KEY,
locat_long int NOT NULL,
locat_lat int NOT NULL,
points int CHECK (points > 0),
creator_user int REFERENCES user (id) NOT NULL,
solved_user int REFERENCES user (id),
)