<?php

include "header.php";
include 'hint/hintFunctions.php';
include 'treasure/treasureFunctions.php';
$username = currentUser();
if (!$username) {
    header("Location: /");
    exit;
}
if ($_POST['lat'] && $_POST['long']){
    $lat = $_POST['lat'];
    $long = $_POST['long'];

    $upper_lat = $lat + 0.15;
    $lower_lat = $lat - 0.15;
    $upper_long = $long + 0.15;
    $lower_long = $long - 0.15;
    $hint = $link->query("Select * from Hint where locat_lat between $lower_lat AND $upper_lat AND locat_long between $lower_long AND $upper_long AND creator_username!='$username'");
    $treasures = $link->query("Select * from Treasure where locat_lat between $lower_lat AND $upper_lat AND locat_long between $lower_long AND $upper_long AND creator_username!='$username' AND solver_username is NULL");

    if ($treasures->num_rows > 0) {
        while ($treasure = $treasures->fetch_assoc()) {
            $id = $treasure['id'];
            $hints = $link->query("Select id from Hint where treasure_id=$id");
            $valid = true;
            while ($row = $hints->fetch_assoc()) {
                $hID = $row['id'];
                $in = $link->query("Select id from History where hint_id=$hID and solver_username='$username'");
                if ($in->num_rows < 1) {
                    $valid = false;
                    break;
                }
            }
            if ($valid) {
                treasureSolve($treasure);
            } else {
                echo "<br /> There is a treasure here, but you must solve all the hints before you can solve the treasure!";
            }
        }
    } else {
        echo "There are no unsolved/valid treasures here <br />";
        echo $treasures->num_rows;
    }
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
                $id = $row['id'];
                $solved = $link->query("Select * from History where hint_id=$id AND solver_username='$username'");
                if ($solved->num_rows === 0) {
                    hintSolve($row);
                }
            }
        }
    } else {
        echo "There are no hints here <br />";
    }
} elseif ($_POST['hint-id-i'] && $_POST['hint-answer-s']) {
    $answer = $_POST['hint-answer-s'];
    $id = $_POST['hint-id-i'];
    $points = $_POST['hint-points-i'];
    $stmt = $link->prepare("Select * from Hint where id=$id AND answer=?");
    $stmt->bind_param("s", $answer);
    $stmt->execute();
    if ($stmt->fetch()) {
        $stmt->close();
        $query = "INSERT INTO History (hint_id, solver_username, treasure_id) VALUES ($id, '$username', NULL)";
        $link->query($query);
        if ($link->error) {
            echo $query . " did not work! <br />";
            echo $link->error;
        } else {
            // Add points to the user since they go it right...
            $query = "Update User set points=points+$points where username='$username'";
            $link->query($query);
            header("Location: /solve.php");
        }
    } else {
        $stmt->close();
        header("Location: /solve.php?correct=Wrong%20Answer%20For%20Hint%20ID%20$id");
    }
    exit;
} elseif ($_POST['treasure-id-i'] && $_POST['treasure-answer-s']) {
    echo var_dump($_POST);
    $answer = $_POST['treasure-answer-s'];
    $id = $_POST['treasure-id-i'];
    $points = $_POST['treasure-points-i'];
    $stmt = $link->prepare("Select * from Treasure where id=$id AND answer=?");
    $stmt->bind_param("s", $answer);
    $stmt->execute();
    if ($stmt->fetch()) {
        $stmt->close();
        $query = "INSERT INTO History (treasure_id, solver_username, hint_id) VALUES ($id, '$username', NULL)";
        $link->query($query);
        if ($link->error) {
            echo $query . " did not work! <br />";
            echo $link->error;
        } else {
            // Add points to the user since they go it right...
            $query = "Update User set points=points+$points where username='$username'";
            $link->query($query);
            $query = "Update Treasure set solver_username='$username' where id=$id";
            $link->query($query);
            header("Location: /solve.php");
        }
    } else {
        $stmt->close();
        header("Location: /solve.php?correct=Wrong%20Answer%20For%20Treasure%20ID%20$id");
    }
    exit;
} else {
    header("Location: /solve.php?correct=Please%20Enter%20An%20Answer");
}
