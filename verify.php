<?php

include "header.php";
include 'hint/hintFunctions.php';
if ($_POST['lat'] && $_POST['long']){
    $lat = $_POST['lat'];
    $long = $_POST['long'];

    $upper_lat = $lat + 0.15;
    $lower_lat = $lat - 0.15;
    $upper_long = $long + 0.15;
    $lower_long = $long - 0.15;
    $username = currentUser();
    $hint = $link->query("Select * from Hint where locat_lat between $lower_lat AND $upper_lat AND locat_long between $lower_long AND $upper_long ");
    $treasure = $link->query("Select * from Treasure where locat_lat between $lower_lat AND $upper_lat AND locat_long between $lower_long AND $upper_long");



    /* $hint = $link->query("Select * from Hint"); */
    /* $treasure = $link->query("Select * from Treasure"); */
    /* $history = $link->query("Select * from History"); */

    // $displayTreasure = array();
    // if ($treasure->num_rows > 0) {
    // 	while ($row = $treasure->fetch_assoc()) {
    // 		echo var_dump($row);
    // 		$id = $row['id'];
    // 		$hints = $link->query("Select hint_id from History where solver_username=$username AND treasure_id=$id");
    // 		echo $hints->num_rows;
    // 	}
    // }

    $displayHint = array();
    if ($hint->num_rows > 0) {
        while ($row = $hint->fetch_assoc()) {
            $id = $row['id'];
            $ids = $link->query("Select id from Hint where next_hint=$id");
            $id = NULL;
            if ($ids->num_rows > 0) {
                // do it here
                while ($id = $ids->fetch_assoc()) {
                    $myID = $id['id'];
                    $num = $link->query("Select hint_id from History where hint_id=$myID AND solver_username='$username'");
                    if ($num->num_rows > 0) {
                        $id = true;
                        break;
                    }
                }
            } else {
                $id = true;
            }
            if ($id) {
                hintSolve($row);
            }
        }
    }
}else if ($_POST['hint-id-i'] && $_POST['hint-answer-s']) {
    $answer = $_POST['hint-answer-s'];
    $id = $_POST['hint-id-i'];
    $stmt = $link->prepare("Select * from Hint where id=$id and answer=?");
    $stmt->bind_param("s", $answer);
    $stmt->execute();
	$stmt->bind_result($existing);
	$stmt->fetch();
    if ($existing) {
        // write to the history
        echo "Solved!!";
    }else{
        // better luck next time
    }
}
