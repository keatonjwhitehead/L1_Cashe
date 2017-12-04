<?php

include "header.php";

$lat = $_POST['lat'];
$long = $_POST['long'];

$hint = $link->query("Select * from Hint where locat_lat=$lat AND locat_long=$long");
$treasure = $link->query("Select * from Treasure where locat_lat=$lat AND locat_long=$long");
$history = $link->query("Select * from History where solver_username='$username'");
/* echo var_dump($hint); */
/* echo var_dump($treasure); */
/* echo var_dump($history); */

$displayHint = array();
if ($hint->num_rows > 0) {
	while ($row = $hint->fetch_assoc()) {
		echo var_dump($row);
	}
}
