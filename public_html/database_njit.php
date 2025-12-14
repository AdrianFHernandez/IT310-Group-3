<?php

    function getDB() {
        $dsn ='mysql:host=sql1.njit.edu;port=3306;dbname=afh23';
        $username = 'afh23';
        $password = '@Dinohunter58';
        try {
            $db = new PDO($dsn, $username, $password);
            echo '<p></p>';
        } catch (PDOException $ex) {
            $error_message = $ex->getMessage();
            include("datebase_error.php");
            exit();
        }

    return $db;
    }
    $dsn ='mysql:host=sql1.njit.edu;port=3306;dbname=afh23';
        $username = 'afh23';
        $password = '@Dinohunter58';
        try {
            $db = new PDO($dsn, $username, $password);
            echo '<p></p>';
        } catch (PDOException $ex) {
            $error_message = $ex->getMessage();
            include("datebase_error.php");
            exit();
        }

?>