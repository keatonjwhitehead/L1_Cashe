<?php

include "header.php";

$lat = $_POST['lat'];
$long = $_POST['long'];

echo distance($lat, $long, 40.00586, -105.25780050000002, "");
$hint = $link->query("Select * from Hint where locat_lat=$lat AND locat_long=$long");
$treasure = $link->query("Select * from Treasure where locat_lat=$lat AND locat_long=$long");
$history = $link->query("Select * from History where solver_username='$username'");
echo var_dump($hint->num_rows);
echo var_dump($treasure->num_rows);
echo var_dump($history->num_rows);



/* if ($hint->num_rows > 0) { */
/* 	echo "lol"; */
/* 	$row = $hint->fetch_assoc(); */
/* 	$id = $row['id']; */
/* 	$check = $link->query("Select id from Hint where next_hint=$id"); */
/* 	echo "$check"; */
/* 	if ($check->num_rows != 0) { */
/* 		for ($i=0; $i < $check->num_rows; $i++) { */
/* 			echo $check[$i]; */
/* 		} */
/* 	} */
/* } */
