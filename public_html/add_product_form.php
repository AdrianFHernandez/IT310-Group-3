<?php
if(session_status() === PHP_SESSION_NONE){
    session_start();}
    if (!isset($_SESSION['is_valid_admin'])) {
    include('login.php');
    exit();
}
require_once('database_njit.php');

// Get category ID
$boardcategory_id = filter_input(INPUT_GET, 'boardcategory_id', FILTER_VALIDATE_INT);
if ($boardcategory_id == NULL || $boardcategory_id == FALSE) {
  $boardcategory_id = 1;
}

// Get name for selected category
$queryCategory = 'SELECT * FROM boardCategories
          WHERE boardCategoryID = :boardcategory_id';
$statement1 = $db->prepare($queryCategory);
$statement1->bindValue(':boardcategory_id', $boardcategory_id);
$statement1->execute();
$category = $statement1->fetch();
$category_name = $category['boardCategoryName'];
$statement1->closeCursor();

// Get all categories
$queryAllCategories = 'SELECT * FROM boardCategories
             ORDER BY boardCategoryID';
$statement2 = $db->prepare($queryAllCategories);
$statement2->execute();
$categories = $statement2->fetchAll();
$statement2->closeCursor();

// Get products for selected category
$queryProducts = 'SELECT * FROM board
          WHERE boardCategoryID = :boardcategory_id
          ORDER BY boardID';
$statement3 = $db->prepare($queryProducts);
$statement3->bindValue(':boardcategory_id', $boardcategory_id);
$statement3->execute();
$products = $statement3->fetchAll();
$statement3->closeCursor();
?>
<html>
    <head>
        <title>Add Product</title>
        <link rel="stylesheet" href="Startingpage.css" />
    </head>
    <body>
    <?php include('header.php'); ?>
    <main>
        <h1>Add Product</h1>
        <form action="add_product.php" method="post"
              id="add_product_form">

            <label>Category:</label>
            <select name="category_id">
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['boardCategoryID']; ?>">
                    <?php echo $category['boardCategoryName']; ?>
                </option>
            <?php endforeach; ?>
            </select><br>
            <label>Code:</label>
            <input type="text" id="code" name="code">
            <span>*</span>
            <br>

            <label>Name:</label>
            <input type="text" id="name"name="name">
            <span>*</span>
            <br>

            <label>Description:</label>
            <input type="text" id="description" name="description">
            <span>*</span>
            <br>

            <label>On Sale:</label>
            <input type="text" id="on_sale" name="on_sale">
            <span>*</span>
            <br>

            <label>Price:</label>
            <input type="text" id="price" name="price">
            <span>*</span>
            <br>

            <input type="submit" value="Add Product">
            <input type="reset"    value="Clear Form"   id="reset_button"  /><br>
        </form>
         <!-- copy-paste from releases.jquery.com -->
        <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
        <!-- copy-paste from releases.jquery.com -->
        <script src="add_product_form.js"></script>
        <p><a href="Product_page.php">View Product List</a></p>
    </main>
    </body>
    <?php include('footer.php'); ?> 
</html>