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
