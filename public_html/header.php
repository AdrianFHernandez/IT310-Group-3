<header>
    <h1>Board Sports Equipment  <img src="images/Shop_logo.jpg" alt="Shop logo" width="60"/></h1>
    <nav>
        <?php 
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }
        if (isset($_SESSION['is_valid_admin'])) { ?>
            <ul class="nav-bar">
                <li> <a href = "index.php" title>Home</a> </li>
                <li> <a href = "Product_page.php" title>Products</a> </li>
                <li> <a href = "Contact.php" title>Contact</a> </li>
                <li> <a href = "add_Product_form.php" title>Add Product</a> </li>
                <li> <a href = "Bodyboard_shipping.php" title>Shipping Address</a> </li>
                <li> <a href = "logout.php" title>Logout</a> </li>
            </ul>
        <?php
        } else { ?>
            <ul class="nav-bar">
                <li> <a href = "index.php" title>Home</a> </li>
                <li> <a href = "p_page.php" title>Products</a> </li>
                <li> <a href = "Contact.php" title>Contact</a> </li>
                <li> <a href = "login.php" title>Login</a> </li>
            </ul>
        <?php
        }?>
    </nav>
</header>