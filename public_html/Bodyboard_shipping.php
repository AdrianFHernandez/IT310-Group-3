<?php
if(session_status() === PHP_SESSION_NONE){
    session_start();}
    if (!isset($_SESSION['is_valid_admin'])) { 
    include('login.php');
    exit();
}
?>
<html>
    <head>
        <title>Board Sports Equipment Shipping</title>
        <link rel="stylesheet" href="Startingpage.css" />
    </head>
    <body>
    <?php include('header.php'); ?> 
        <p class="table"> Add Shipping Address
            <form action="Shippingaddress.php" method="post">
                <label>Street:</label>
                <input type="text" name="street_name" /> 
                <br>
                <label>City:</label>
                <input type="text" name="city_name" />
                <br>
                <label>State:</label>
                <input type="text" name="state_name" />
                <br>
                <label>Zipcode:</label>
                <input type="text" name="zipcode_name" />
                <br>
                <input type="submit" />
            </form>
        </p>
    </body>
    <?php include('footer.php'); ?>
</html>
