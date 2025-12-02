<?php
require_once('database_njit.php');

function boardmanager($email, $password, $firstName, $lastName) {
    $db = getDB();
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $query = 'INSERT INTO boardManagers (emailAddress, password, firstName, lastName, dateCreated)
            VALUES (:email, :password, :firstName, :lastName, NOW())';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $hash);
    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);
    try {
        $statement->execute();
        echo "Success=$email\n";
    } catch (PDOException $e) {
        if ($e->errorInfo[1] == 1062) {
            echo "Error: Email '$email' already exists\n";
        } else {
            echo "Error: " . $e->getMessage() . "\n";
        }
    }
    $statement->closeCursor();
}

echo "Start\n";
boardmanager('luca12@gmail.com', 'password', 'Luca', 'Hernandez');
boardmanager('ben10thousand@gmail.com', 'omniverse', 'Ben', 'Tennyson');
boardmanager('YunoG4leaf@gmail.com', 'Clover_Spade', 'Yuno', 'Grinberryall');
echo "Done\n";
?>