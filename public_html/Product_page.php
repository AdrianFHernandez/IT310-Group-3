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

$db = getDB();
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
        <title>Board Sports Equipment Products</title>
        <link rel="stylesheet" href="Startingpage.css" />
        <script> 
            function  confirmDelete(event, form) {
              event.preventDefault();
              if (confirm('Are you sure you want to delete this product?')) {
                form.submit();
              }
              else {
                console.log('Delete cancelled');
              }
            }
        </script>
    </head>
    <body>
    <?php include('header.php'); ?>
    <main>
        <h1>Product List</h1>
        <aside>
            <!-- display a list of categories -->
            <nav class="not-bar">
            <ul>
                <?php foreach ($categories as $category) : ?>
                <li>
                    <a href="?boardcategory_id=<?php 
                        echo $category['boardCategoryID']; 
                        ?>">
                    <?php echo $category['boardCategoryName']; ?></a>
                </li>
                <?php endforeach; ?>
            </ul>
            </nav>       
        </aside>
    <section>
        <table>
            <tr>
                <!-- <th>Image of product</th> -->
                <th>Code</th>
                <th>Product name</th>
                <th>Description</th>
                <th>Price</th>
            </tr>
            
            <?php foreach ($products as $product) : ?>
            <tr>
                <td><a href="productsDetails.php?product_id=<?php echo $product['boardID']; ?>"><?php echo htmlspecialchars($product['boardCode']); ?></a></td>
                <td><?php echo $product['boardName']; ?></td>
                <td><?php echo $product['boarddescription']; ?></td>
                <td><?php echo $product['boardprice']; ?></td>
                <td><form action="delete_product.php" method="post" onsubmit="confirmDelete(event, this)">
          <input type="hidden" name="board_id"
              value="<?php echo $product['boardID']; ?>">
          <input type="hidden" name="boardcategory_id"
              value="<?php echo $product['boardCategoryID']; ?>">
          <input type="submit" value="Delete"> 
        </form></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </section>
    </body>
    <?php include('footer.php'); ?>
</html>