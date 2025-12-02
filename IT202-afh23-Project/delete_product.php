<?php
    //Slide 37
    //use database_local or _njit.php
    require_once('database_njit.php');

    //Get ids
    $board_id = filter_input(INPUT_POST, 'board_id', FILTER_VALIDATE_INT);
    $boardcategory_id = filter_input(INPUT_POST, 'boardcategory_id', FILTER_VALIDATE_INT);

    if ($board_id != FALSE && $boardcategory_id != FALSE) {
        $query = 'DELETE FROM board WHERE boardID = :board_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':board_id', $board_id);
        $success = $statement->execute();
        $statement->closeCursor();
        echo "<p>Your delete statement status is $success</p>";
    }
?>