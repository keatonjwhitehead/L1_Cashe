<?php

include "header.php";
myHeader("Solve the Puzzle!");

if (!currentUser()) {
    header("Location: /");
    exit;
}

<<<<<<< HEAD
=======
echo "<h1>" . $_GET['correct'] . "</h1>";
>>>>>>> 87f31964beff33be96d1108dc20b1b7093914abd

?>

<div style="padding: 50px; width: 400px; background-color: #13c6ba; margin: auto; color: white; cursor: pointer;" id="solve-hints-treasure">
    <h3>Check for Hints or Treasure</h3>
</div>
<<<<<<< HEAD
<div id="answer">

=======

<div id="answerForm">
>>>>>>> 87f31964beff33be96d1108dc20b1b7093914abd
</div>

<?php

include "footer.php";
/* End of file <`2solve`>.php */
