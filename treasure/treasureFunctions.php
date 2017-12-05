<?php


function treasureForm($row)
{
	/*
	 *
	 CREATE TABLE Treasure (
		 id int PRIMARY KEY,
		 treasurename varchar(100) NOT NULL,
		 locat_long int NOT NULL,
		 locat_lat int NOT NULL,
		 points int CHECK (points > 0),
		 user_id_creator int REFERENCES User (id),
		 CONSTRAINT unique_treasure UNIQUE (treasurename)
	 );
	 */
	if ($row) {
?>
	<form action="/user.php" method="post" >
		<div class="col-sm-6">
			<div class="panel panel-default" style="margin:10%">
				<div class="panel-heading">
					<label for="treasure-id-i"><h1 class="panel-title">Treasure ID:</h1></label>
				</div>
				<div class="panel-body">
					<input type="text" class="form-control" value="<?php echo $row['id'];?>" readonly name="treasure-id-i"  style="margin-bottom:4%">
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="panel panel-default" style="margin:10%">
				<div class="panel-heading">
					<label for="treasure-treasurename-s"><h1 class="panel-title">Treasure Name:</h1></label>
				</div>
				<div class="panel-body">
					<input type="text" class="form-control" value="<?php echo $row['treasurename'];?>" name="treasure-treasurename-s"  style="margin-bottom:4%">
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="panel panel-default" style="margin:10%">
				<div class="panel-heading">
					<label for="treasure-locat_lat-d"><h1 class="panel-title">Latitude (Please do not edit this unless you are sure of what you are doing!):</h1></label>
				</div>
				<div class="panel-body">
					<input type="text" class="form-control" value="<?php echo $row['locat_lat'];?>" name="treasure-locat_lat-d"  style="margin-bottom:4%">
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="panel panel-default" style="margin:10%">
				<div class="panel-heading">
					<label for="treasure-locat_long-d"><h1 class="panel-title">Longitude (Please do not edit this unless you are sure of what you are doing!):</h1></label>
				</div>
				<div class="panel-body">
					<input type="text" class="form-control" value="<?php echo $row['locat_long'];?>" name="treasure-locat_long-d"  style="margin-bottom:4%">
				</div>
			</div>
		</div>
		<div class="col-sm-12">
			<div class="panel panel-default" style="margin:5%">
				<div class="panel-heading">
					<label for="treasure-question-s"><h1 class="panel-title">Question:</h1></label>
				</div>
				<div class="panel-body">
					<input type="text" class="form-control" value="<?php echo $row['question'];?>" name="treasure-question-s"  style="margin-bottom:4%">
				</div>
			</div>
		</div>
		<div class="col-sm-12">
			<div class="panel panel-default" style="margin:5%">
				<div class="panel-heading">
					<label for="treasure-answer-s"><h1 class="panel-title">Answer:</h1></label>
				</div>
				<div class="panel-body">
					<input type="text" class="form-control" value="<?php echo $row['answer'];?>" name="treasure-answer-s"  style="margin-bottom:4%">
				</div>
			</div>
		</div>
		<div class="col-sm-12">
			<div class="panel panel-default" style="margin:5%">
				<div class="panel-heading">
					<label for="treasure-points-i"><h1 class="panel-title">Rewards:</h1></label>
				</div>
				<div class="panel-body">
					<input type="text" class="form-control" value="<?php echo $row['points'];?>" name="treasure-points-i"  style="margin-bottom:4%">
				</div>
			</div>
		</div>
		<div class="col-sm-12">
			<div class="panel panel-default" style="margin:5%">
				<div class="panel-heading">
					<label for="treasure-solver_username-s"><h1 class="panel-title">Solver:</h1></label>
				</div>
				<div class="panel-body">
					<input type="text" class="form-control" placeholder="No one has solved the Treasure yet..." value="<?php echo $row['solver_username'];?>" style="margin-bottom:4%" readonly>
				</div>
			</div>
			<center style="margin-bottom:5%">
				<button type="submit" class="btn btn-default" style="background:#69f0ae"><strong>Update</strong></button>
			</center>
		</div>	
	</form>
<?php
	} else {
?>
	<form action="/user.php" method="post" style="margin-top: 50px;">
		<div class="col-sm-4 col-sm-offset-4">
			<h4>Create New Treasure</h4>
			<div>Please not that the location of your treasure will be where you are at the moment you submit this form!</div>
			<label for="treasure-treasurename-s">Treasure Name:</label>
			<input type="text" class="form-control" name="treasure-treasurename-s"  style="margin-bottom:4%">
			<label for="treasure-question-s">Question:</label>
			<input type="text" class="form-control" name="treasure-question-s"  style="margin-bottom:4%">
			<label for="treasure-answer-s">Answer:</label>
			<input type="text" class="form-control" name="treasure-answer-s"  style="margin-bottom:4%">
			<label for="treasure-points-i">Rewards:</label>
			<input type="number" class="form-control" name="treasure-points-i"  style="margin-bottom:4%">
			<label for="treasure-locat_long-d">Longitude:</label>
			<input type="text" class="form-control" name="treasure-locat_long-d" id="treasure-locat_long" style="margin-bottom:4%" readonly>
			<label for="treasure-locat_lat-d">Latitude:</label>
			<input type="text" class="form-control" name="treasure-locat_lat-d" id="treasure-locat_lat" style="margin-bottom:4%" readonly>
			<center>
				<button type="submit" class="btn btn-default" style="background:#69f0ae"><strong>Update</strong></button>
			</center>
		</div>
	</form>
<?php
	}
	/* echo "<div style='width: 100px; height: 300px;'></div>"; */
}

function treasureSolve($row){
?>
<div style="padding: 20px; border: 1px solid black; margin-top: 20px;">
	<center>
		<h1><?php echo $row['treasurename']; ?></h1>
	</center>
	<form action="/verify.php" method="post">
		<label for="treasure-id-i">Hint ID:</label>
		<input type="text" class="form-control" value="<?php echo $row['id'];?>" readonly name="treasure-id-i"  style="margin-bottom:4%">
		<label for="treasure-points-i">Rewards:</label>
		<input type="text" class="form-control" value="<?php echo $row['points'];?>" name="treasure-points-i"  style="margin-bottom:4%" readonly>
		<label for="treasure-question-s">Question:</label>
		<input type="text" class="form-control" value="<?php echo $row['question'];?>" name="treasure-question-s"  style="margin-bottom:4%" readonly>
		<label for="treasure-answer-s">Answer:</label>
		<input type="text" class="form-control" name="treasure-answer-s"  style="margin-bottom:4%">
		<center>
			<button type="submit" class="btn btn-default" style="background:#69f0ae"><strong>Submit</strong></button>
		</center>
	</form>
</div>
	<?php
}
/* End of file treasureFunctions.php */
