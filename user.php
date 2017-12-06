<?php

include 'header.php';
myHeader(currentUser());
include 'treasure/treasureFunctions.php';
include 'hint/hintFunctions.php';

if ($_POST['treasure-id-i']) {
    // update treasure using sql bindings
    updateObject($link, "Treasure", $_POST);
} elseif ($_POST['treasure-treasurename-s'] && $_POST['treasure-points-i']) {
    // create new treasure
    createObject($link, "Treasure", $_POST);
} else if($_POST['hint-id-i']){
    // update the hint
    updateObject($link, "Hint", $_POST);
} else if($_POST['hint-hintname-s'] && $_POST['hint-points-i']){
    // create new hint
    createObject($link, "Hint", $_POST);
}


?>

<div>
    <center>
	<h1 class="byUser" id="hints" >Hints</h1>
    </center>
<?php
$result = userobjects($link, "Hint");
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
	hintForm($row);
    }
}
hintForm(null);
$result->close();
?>
</div>
<div>
    <center>
	<h1 class="byUser" id="hints" >Treasure</h1>
    </center>
<?php
$treasures = userobjects($link, "Treasure");
if ($treasures->num_rows > 0) {
    while($row = $treasures->fetch_assoc()) {
	treasureform($row);
    }
}
treasureform(null);
$treasures->close();
?>
</div>


<?php
include "footer.php";
/* End of file user.php */
