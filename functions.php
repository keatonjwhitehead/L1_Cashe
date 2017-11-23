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
		// Log in this user using cookies..
		// if localhost, does not have to be https else it does
		$domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false;
		setcookie('user', $username, time()+60*60*24*365, '/', $domain, true);
	} else {
		echo "Either the username or the password is incorrect!";
	}
	$stmt->close();
}


function currentUser() {
	// Returns the current user or nil if no one is logged in
	// does this by fetching the cookie and return the id of the USER
	return $_COOKIE['user'];
}

function logoutUser() {
	// Log out the current user or don't do anything at all
	unset($_COOKIE['user']);
	setcookie('user', null, -1, '/');
}
