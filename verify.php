<?php

include "header.php";

$lat = $_POST['lat'];
$long = $_POST['long'];
$username = currentUser();
$hint = $link->query("Select * from Hint where locat_lat=$lat AND locat_long=$long");
$treasure = $link->query("Select * from Treasure where locat_lat=$lat AND locat_long=$long");
$history = $link->query("Select * from History where solver_username=$username");
echo var_dump($hint->num_rows);
echo var_dump($treasure->num_rows);
echo var_dump($history->num_rows);