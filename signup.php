<?php

include "header.php";

myHeader("Sign Up");

?>  
		<div class="row content">
			<div class="col-sm-2 sidenav">
				<p><a href="#" style="color:blue">Rules</a></p>
				<p><a href="#" style="color:blue">Feedback</a></p>
			</div>
			<div class="col-sm-8"> 
				<center>
					<h1 style="margin-bottom:8%">Sign Up!</h1>
				</center>
				<form>
					<div class="col-sm-4 col-sm-offset-4">
						<label for="email">Email:</label>
						<input type="email" class="form-control" id="email" placeholder="Enter email" name="email"  style="margin-bottom:4%">
						<label for="pwd">Password:</label>
						<input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" style="margin-bottom:4%">
						<label for="rpwd">Repeat Password:</label>
						<input type="password" class="form-control" id="rpwd" placeholder="Enter password again" name="rpwd" style="margin-bottom:4%">
						<center>
							<button type="submit" class="btn btn-default" style="background:#69f0ae"><strong>Submit</strong></button>
							<button type="submit" class="btn btn-default" style="background:#ff5252"><strong>Cancel</strong></button>
						</center>
					</div>						
				</form>	
			</div>
		</div>

<?php

include "footer.php";


?>
