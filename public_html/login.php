<?php 
if (!isset($login_message)) {
$login_message = 'You must login to view this page.';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Board Sports Equipment Products</title>
        <link rel="stylesheet" href="Startingpage.css" />
    </head>
    <body>
    <?php include('header.php'); ?>
    <main>
      <h1>Login</h1>
      <form action="authenticate.php" method="post">
        <label>Email:</label>
        <input type="text" name="email" value="">
        <br>
        <label>Password:</label>
        <input type="password" name="password" value="">
        <br>
        <input type="submit" value="Login">
      </form>
      <p><?php echo $login_message; ?></p>
    </main>
    <nav>
            <ul class="nav-bar">
                <li> <a href = "" title></a> </li>
            </ul>
        </nav> 
  </body>
</html>