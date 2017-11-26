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
	$stmt->close();
	if ($existing) {
		return false;
	} else {
		$stmt = $link->prepare("Insert INTO User (username, password, points) Values (?, ?, 0)");
		// Storing the hash of the password... never store the password as plain text
		$stmt->bind_param("ss", $username, password_hash("$password", PASSWORD_DEFAULT));
		$stmt->execute();
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

function userObjects($link, $table)
{
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

function updateObjects($link, $table, $object)
{
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
}
