#Started by Jason Lubrano
#30 October 2017

CREATE TABLE UserProfile
(
id int PRIMARY KEY, #number automatically assigned to each user
username varchar(20), NOT NULL #username
password varchar(20), NOT NULL #password given to each user
points int CHECK (points > 0), #always have positive points called a <<check constraint>> btw
#gps location is what value? lat and longs?
CONSTRAINT unique_user UNIQUE (username) #users cant have the same username
);

CREATE TABLE History
(
#solved puzzles
#gps location, lat and longs (?) GPSLOC int REFERENCES UserProfile(GPSLOC)
		#^ orphan records that leaves bad data because we wont be there anymore(?)
		#Can we just delete the challenge at that locaition all together for that user
		#e.g. if a user solves the folsom stadium challenge, 
		#it doesnt show up on their map with a checkmark noting they solved it
)

CREATE TABLE Treasure
(


)