<?php
/*
 *
 * The following function are about creating users, and modifying the user's point levels
 *
 * */
function createUser($link, $username, $password){
	// Make sure to use prepared statements and bindings to prevent sql injections
	$stmt = $link->prepare("Select ID from User where User.username=?");
	$stmt->bind_param("s", $username);
	$stmt->execute();
	$stmt->bind_result($existing);
	$stmt->fetch();
<<<<<<< HEAD
	$stmt->close();
	if ($existing) {
		return false;
	} else {
		$stmt = $link->prepare("Insert INTO User (username, password, points) Values (?, ?, 0)");
		// Storing the hash of the password... never store the password as plain text
		$stmt->bind_param("ss", $username, password_hash("$password", PASSWORD_DEFAULT));
		$stmt->execute();
=======
	if ($existing) {
		$stmt->close();
		return false;
	} else {
		$stmt->close();
		$stmt = $link->prepare("Insert INTO User (username, password, points) Values (?, ?, 0)");
		// Storing the hash of the password... never store the password as plain text
		$stmt->bind_param("ss", $username, password_hash("$password", PASSWORD_DEFAULT));
		if (!$stmt->execute()) {
			echo "$username could not be created because the sql statement could not be executed! <br />";
			echo "$stmt->error <br />";
			$stmt->close();
			return false;
		}
		$stmt->close();
>>>>>>> 87f31964beff33be96d1108dc20b1b7093914abd
		return true;
	}
}

function loginUser($link, $username, $password) {
	// log in a user function
	$stmt = $link->prepare("Select username,password from User where User.username=?");
	$stmt->bind_param("s", $username);
	$stmt->execute();
	$stmt->bind_result($username, $hash);
	if ($stmt->fetch() && password_verify($password, $hash)) {
		$_SESSION['user'] = $username;
		$stmt->close();
		return true;
	} else {
		$stmt->close();
		return false;
	}
}


function currentUser() {
	// Returns the current user or nil if no one is logged in
	// does this by fetching the cookie and return the id of the USER
	return $_SESSION['user'];
}

function logoutUser() {
	// Log out the current user or don't do anything at all
	unset($_SESSION['username']);
	session_destroy();
	header("Location: login.php");
	exit;
}

<<<<<<< HEAD
function userObjects($link, $table)
{
=======
function userObjects($link, $table) {
>>>>>>> 87f31964beff33be96d1108dc20b1b7093914abd
	$username = currentUser();
	if (!$username) {
		header("Location: /");
		exit;
	}
	// Its okay to not use sql binding here becauser we are not taking user inputs
	// If we wanted to be totally save, we would be using sql bindings right here
	$query = $link->query("Select * from $table where creator_username='$username'");
	return $query;
}


/**
 * updateObjects
 * $link connector with the database
 * $table name of the table
 * $object is a dictionary arr with table-collumName-valTypeLetter as the keys
 */
<<<<<<< HEAD
function updateObject($link, $table, $object)
{
=======
function updateObject($link, $table, $object) {
>>>>>>> 87f31964beff33be96d1108dc20b1b7093914abd
	// How this works is really funny
	// update the table with the rows
	// the client will never type the table to upload so its okey not to bind that
	$statement = "Update $table Set ";
	$id = 0;
	$types = "";
	$id_place = "";
	foreach ($object as $key => $value) {
		// doing key without bind is ok because users do not input the key
		$key_split = explode("-", "$key");
		$keyMiddle = $key_split[1];
		if ($keyMiddle == "id") {
			$id = $value;
			$id_place = $key;
			continue;
		}
		$statement .= "$keyMiddle=?, ";
		$types .= $key_split[2];
	}
	$statement = rtrim($statement,', ');
	$statement .= " where id=$id";
	$stmt = $link->prepare($statement);
	$object[$id_place] = $types;
	call_user_func_array(array($stmt, 'bind_param'), $object);
	if (!$stmt->execute()) {
		echo "<h3>The $table could not be updated!</h3>";
	}
<<<<<<< HEAD
=======
	$stmt->close();
>>>>>>> 87f31964beff33be96d1108dc20b1b7093914abd
}

function createObject($link, $table, $object){
	$username = currentUser();
	if (!$username) {
		header("Location: /");
		exit;
	}
	$statement = "Insert INTO $table (";
	$id = 0;
	$types = "";
	$id_place = "";
	$vals = "";
	foreach ($object as $key => $value) {
		// doing key without bind is ok because users do not input the key
		$key_split = explode("-", "$key");
		$keyMiddle = $key_split[1];
		if ($keyMiddle == "id") {
			$id = $value;
			$id_place = $key;
			continue;
		}
		$statement .= "$keyMiddle, ";
		$vals .= "?, ";
		$types .= $key_split[2];
	}
	$statement .= "creator_username";
	$vals .= "'$username')";
	$statement .= ") VALUES (" . $vals;
	$stmt = $link->prepare($statement);
	array_unshift($object, $types);
	call_user_func_array(array($stmt, 'bind_param'), $object);
	if (!$stmt->execute()) {
<<<<<<< HEAD
		echo "<h3>The $table could not be updated!</h3>";
	}
=======
		echo "<h3>The $table could not be created!</h3>";
	}
	$stmt->close();
>>>>>>> 87f31964beff33be96d1108dc20b1b7093914abd
}

// for later when we want to make sure that we calculated the distance between two long and lat points
function distance($lat1, $lon1, $lat2, $lon2, $unit) {
	$theta = $lon1 - $lon2;
	$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
	$dist = acos($dist);
	$dist = rad2deg($dist);
	$miles = $dist * 60 * 1.1515;
	$unit = strtoupper($unit);

	if ($unit == "K") {
		return ($miles * 1.609344);
	} else if ($unit == "N") {
		return ($miles * 0.8684);
	} else {
		return $miles;
	}
}
<<<<<<< HEAD
	
=======
>>>>>>> 87f31964beff33be96d1108dc20b1b7093914abd
