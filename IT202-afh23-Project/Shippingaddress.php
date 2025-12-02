<?php
if(session_status() === PHP_SESSION_NONE){
    session_start();}
    if (!isset($_SESSION['is_valid_admin'])) { 
    include('login.php');
    exit();
}
  $street_name = $_POST['street_name'];
  $city_name = $_POST['city_name'];
  $state_name = $_POST['state_name'];
  $zipcode_name = $_POST['zipcode_name'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Ordered Confirm</title>
        <link rel="stylesheet" href="Startingpage.css" />
    </head>
    <body>
        <?php include('header.php'); ?> 
        <h2 class="table">Your Order has been Confirmed</h2>
        <p class="table"> Order will be shipped to
        <br>
        <?php echo $street_name; ?> <br>
        <?php echo $city_name; ?> <?php echo $state_name; ?> <?php echo $zipcode_name; ?></p>
        <br>
        <?php include('footer.php'); ?>
    </body>
</html>