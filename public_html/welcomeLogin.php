<!DOCTYPE html>
<html>
    <head>
        <title>Board Sports Equipment Home</title>
        <link rel="stylesheet" href="Startingpage.css" />
        <?php include('header.php'); ?>
    </head>
    <body>
        <?php
        // Get all categories
        $queryAllCategories = 'SELECT firstName, lastName, emailAddress FROM boardManagers
                    WHERE emailAddress = :emailAddress';
        $statement2 = $db->prepare($queryAllCategories);
        $statement2->bindValue(':emailAddress', $email);
        $statement2->execute();
        $managers = $statement2->fetch();
        $statement2->closeCursor();

        $_SESSION['fname'] = $managers['firstName'];
        $_SESSION['lname'] = $managers['lastName'];
        $_SESSION['email'] = $managers['emailAddress'];
        ?><p class="info"> <?php
            echo("Welcome ");
            echo $_SESSION['fname']; 
            echo(" ");
            echo $_SESSION['lname'];
            echo(" (");
            echo $_SESSION['email'];
            echo(" )");
        ?>
        </p>
        <br>
        <br>
        <p class ="subtext"> <?php
            echo("Click the Home Page button to continue");
            ?>
            <br>
            <a href = "Startingpage.php" title>Home</a> </li></p>
    </body>
    <?php include('footer.php'); ?>
</html>
