<?php
require_once('database_njit.php');


// Get product ID
$product_id = filter_input(INPUT_GET, 'product_id', FILTER_VALIDATE_INT);
if ($product_id == NULL || $product_id == FALSE) {
  // Handle invalid or missing product ID
  echo "Invalid product ID";
  exit();
}

$db = getDB();
// Get product details
$queryProduct = 'SELECT * FROM board
          WHERE boardID = :product_id';
$statement = $db->prepare($queryProduct);
$statement->bindValue(':product_id', $product_id);
$statement->execute();
$product = $statement->fetch();
$statement->closeCursor();


if (!$product) {
  // Handle product not found
  echo "Product not found";
  exit();
}
?>

<html>
  <head>
      <title><?php echo $product['boardName']; ?></title>
      <link rel="stylesheet" href="Startingpage.css" />
  </head>
  <body>
      <?php include('header.php'); ?>
      <main class="datails" id="image_rollovers">
          <link rel="stylesheet" href="image.css"/>
          <h1><?php echo $product['boardName']; ?></h1>
          <img  class="img" src="images/<?php echo $product['boardCode']; ?>.png" alt="<?php echo $product['boardName']; ?>" height="250" /> <br>
          <p><strong>Code:</strong> <?php echo $product['boardCode']; ?></p>
          <p><strong>Description:</strong> <?php echo $product['boarddescription']; ?></p>
          <p><strong>Price:</strong> $<?php echo $product['boardprice']; ?></p>
          <!-- You can add more details here -->
        <!--INCLUDE JQUERY LIBRARY-->
        <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" 
        integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" 
        crossorigin="anonymous"></script>
        <!--INCLUDE JQUERY LIBRARY-->
        <script src="productsDetails.js"></script>
      </main>
      <?php include('footer.php'); ?>
  </body>
</html>
