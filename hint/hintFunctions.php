<?php

function hintForm($row){
        /*
         *
         CREATE TABLE Hint (
                 id int PRIMARY KEY,
                 hintname varchar(100) NOT NULL,
                 locat_lat double NOT NULL,
                 locat_long double NOT NULL,
                 points int CHECK (points > 0),
                 creator_username varchar(100) NOT NULL,
                 next_hint int,
                 treasure_id int REFERENCES Treasure (id),
                 CONSTRAINT unique_hint UNIQUE (hintname)
         );
         */
        if ($row) {
?>
                <form action="/user.php" method="post">
                    <div class="col-sm-4 col-sm-offset-4">
                        <label for="hint-id-i">Hint ID:</label>
                        <input type="text" class="form-control" value="<?php echo $row['id'];?>" readonly name="hint-id-i"  style="margin-bottom:4%">
                        <label for="hint-hintname-s">Hint Name:</label>
                        <input type="text" class="form-control" value="<?php echo $row['hintname'];?>" name="hint-hintname-s"  style="margin-bottom:4%">
                        <label for="hint-question-s">Question:</label>
                        <input type="text" class="form-control" value="<?php echo $row['question'];?>" name="hint-question-s"  style="margin-bottom:4%">
                        <label for="hint-answer-s">Answer:</label>
                        <input type="text" class="form-control" value="<?php echo $row['answer'];?>" name="hint-answer-s"  style="margin-bottom:4%">
                        <label for="hint-points-i">Rewards:</label>
                        <input type="text" class="form-control" value="<?php echo $row['points'];?>" name="hint-points-i"  style="margin-bottom:4%">
                        <label for="hint-next_hint-i">Next Hint ID</label>
                        <input type="number" class="form-control" value="<?php echo $row['next_hint'];?>" name="hint-next_hint-i"  style="margin-bottom:4%">
                        <label for="hint-next_hint_desc-s">Next Hint Description</label>
                        <input type="text" class="form-control" value="<?php echo $row['next_hint_desc'];?>" name="hint-next_hint_desc-s"  style="margin-bottom:4%">
                        <label for="hint-treasure_id-i">Treasure ID</label>
                        <input type="number" class="form-control" value="<?php echo $row['treasure_id'];?>" name="hint-treasure_id-i"  style="margin-bottom:4%">
                        <label for="hint-locat_lat-d">Latitude (Please do not edit this unless you are sure of what you are doing!):</label>
                        <input type="text" class="form-control" value="<?php echo $row['locat_lat'];?>" name="hint-locat_lat-d"  style="margin-bottom:4%">
                        <label for="hint-locat_long-d">Longitude (Please do not edit this unless you are sure of what you are doing!):</label>
                        <input type="text" class="form-control" value="<?php echo $row['locat_long'];?>" name="hint-locat_long-d"  style="margin-bottom:4%">
                        <center>
                            <button type="submit" class="btn btn-default" style="background:#69f0ae"><strong>Update</strong></button>
                        </center>
                    </div>
                </form>
<?php
        } else {
?>
            <form action="/user.php" method="post">
                <div class="col-sm-4 col-sm-offset-4">
                    <label for="hint-hintname-s">Hint Name:</label>
                    <input type="text" class="form-control" name="hint-hintname-s"  style="margin-bottom:4%">
                    <label for="hint-question-s">Question:</label>
                    <input type="text" class="form-control" name="hint-question-s"  style="margin-bottom:4%">
                    <label for="hint-answer-s">Answer:</label>
                    <input type="text" class="form-control" name="hint-answer-s"  style="margin-bottom:4%">
                    <label for="hint-points-i">Rewards:</label>
                    <input type="text" class="form-control" name="hint-points-i"  style="margin-bottom:4%">
                    <label for="hint-next_hint-i">Next Hint ID</label>
                    <input type="number" class="form-control" name="hint-next_hint-i"  style="margin-bottom:4%">
                    <label for="hint-next_hint_desc-s">Next Hint Description</label>
                    <input type="text" class="form-control" name="hint-next_hint_desc-s"  style="margin-bottom:4%">
                    <label for="hint-treasure_id-i">Treasure ID</label>
                    <input type="number" class="form-control" name="hint-treasure_id-i"  style="margin-bottom:4%">
                    <label for="hint-locat_lat-d">Latitude (Please do not edit this unless you are sure of what you are doing!):</label>
                    <input type="text" class="form-control" name="hint-locat_lat-d" id="treasure-locat_lat" style="margin-bottom:4%" readonly>
                    <label for="hint-locat_long-d">Longitude (Please do not edit this unless you are sure of what you are doing!):</label>
                    <input type="text" class="form-control" name="hint-locat_long-d" id="treasure-locat_long" style="margin-bottom:4%" readonly>
                    <center>
                        <button type="submit" class="btn btn-default" style="background:#69f0ae"><strong>Create</strong></button>
                    </center>
                </div>
            </form>
<?php
        }
}



function hintSolve($row){
?>
<div style="padding: 20px; border: 1px solid black; margin-top: 20px;">
    <center>
        <h1><?php echo $row['hintname']; ?></h1>
    </center>
    <form action="/verify.php" method="post">
        <label for="hint-id-i">Hint ID:</label>
        <input type="text" class="form-control" value="<?php echo $row['id'];?>" readonly name="hint-id-i"  style="margin-bottom:4%">
        <label for="hint-treasure_id-i">Tresure ID:</label>
        <input type="text" class="form-control" value="<?php echo $row['treasure_id'];?>" readonly name="hint-treasure_id-i"  style="margin-bottom:4%">
        <label for="hint-points-i">Rewards:</label>
        <input type="text" class="form-control" value="<?php echo $row['points'];?>" name="hint-points-i"  style="margin-bottom:4%" readonly>
        <label for="hint-question-s">Question:</label>
        <input type="text" class="form-control" value="<?php echo $row['question'];?>" name="hint-question-s"  style="margin-bottom:4%" readonly>
        <label for="hint-answer-s">Answer:</label>
        <input type="text" class="form-control" name="hint-answer-s"  style="margin-bottom:4%">
        <center>
            <button type="submit" class="btn btn-default" style="background:#69f0ae"><strong>Submit</strong></button>
        </center>
    </form>
</div>
    <?php
}
function hintSolved($row){
?>
<div style="padding: 20px; border: 1px solid black; margin-top: 20px;">
    <center>
        <h1><?php echo $row['hintname']; ?> Already Solved!!</h1>
    </center>
        <label for="hint-id-i">Hint ID:</label>
        <input type="text" class="form-control" value="<?php echo $row['id'];?>" readonly name="hint-id-i"  style="margin-bottom:4%">
        <label for="hint-treasure_id-i">Tresure ID:</label>
        <input type="text" class="form-control" value="<?php echo $row['treasure_id'];?>" readonly name="hint-treasure_id-i"  style="margin-bottom:4%">
        <label for="hint-points-i">Rewards:</label>
        <input type="text" class="form-control" value="<?php echo $row['points'];?>" name="hint-points-i"  style="margin-bottom:4%" readonly>
        <label for="hint-question-s">Question:</label>
        <input type="text" class="form-control" value="<?php echo $row['question'];?>" name="hint-question-s"  style="margin-bottom:4%" readonly>
        <label for="hint-answer-s">Answer:</label>
        <input type="text" class="form-control" name="hint-answer-s" value="<?php echo $row['answer'];?>" style="margin-bottom:4%" readonly>
</div>
    <?php
}
