<?php

include "header.php";

myHeader("Sign Up");


if (isset($_POST['email']) && isset($_POST["rpwd"])) {
	if (createUser($link, $_POST['email'], $_POST['rpwd'])) {
		/* echo $_POST['email']; */
		loginUser($link, $_POST['email'], $_POST['rpwd']);
		header("Location: /");
	} else {
		echo "The user could not be created successfully! The username might already be in our database. <br />";
	}
} else {
?>
		<div class="col-sm-8 col-sm-offset-2" style="margin-bottom:10%;">
			<h1 class="text-center" style="font-size:500%; margin-bottom:8%;">Sign Up!</h1>
			<form action="signup.php" method="post">
				<div class="panel panel-default col-sm-4 col-sm-offset-4" style="background:rgba(0,188,212,0.1)">
					<div class="form-group" style="margin-top:10%">
						<label for="email">Email:</label>
						<input type="email" class="form-control" id="email" placeholder="Enter email" name="email"  style="margin-bottom:4%">
					</div>
					<div class="form-group">
						<label for="pwd">Password:</label>
						<input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" style="margin-bottom:4%">
					</div>
					<div class="form-group">
						<label for="rpwd">Repeat Password:</label>
						<input type="password" class="form-control" id="rpwd" placeholder="Enter password again" name="rpwd" style="margin-bottom:4%">
					</div>
					<div class="form-group" style="margin-bottom:10%">
						<center>
							<button type="submit" class="btn btn-success">Submit</button>
							<button type="submit" class="btn btn-danger">Cancel</button>
						</center>
					</div>
				</div>
			</form>
		</div>
<?php
}
include "footer.php";


?>
