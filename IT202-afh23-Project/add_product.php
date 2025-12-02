
<!DOCTYPE html>
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
        <title>Board Sports Equipment Home</title>
        <link rel="stylesheet" href="Startingpage.css" />
    </head>
    <body>
<?php include('header.php');

$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
$code = filter_input(INPUT_POST, 'code');
$name = filter_input(INPUT_POST, 'name');
$description = filter_input(INPUT_POST, 'description');
$on_sale = filter_input(INPUT_POST, 'on_sale');
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);

if ($category_id == NULL || $category_id == FALSE || $code == NULL || 
        $name == NULL || $description == NULL || $on_sale == NULL || $price == NULL || $price == FALSE) {
    $error = "Invalid product data. Check all fields and try again.";
    echo "$error <br>";
    // include('error.php');
} else {
    require_once('database_njit.php');

    // Add the product to the database  
    $query = 'INSERT INTO board
                 (boardCategoryID, boardCode, boardName, boarddescription, boardonslae, boardprice, dateCreated)
              VALUES
                 (:category_id, :code, :name, :description, :on_sale, :price, NOW())';
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->bindValue(':code', $code);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':on_sale', $on_sale);
    $statement->bindValue(':price', $price);
    $success = $statement->execute();
    $statement->closeCursor();
    echo "<p>Your product has been added to product list</p>";

}
?>
<p><a href="Product_page.php">View Product List</a></p>

<!DOCTYPE html>
<html>
    <body>
        <?php include('footer.php'); ?>
    </body> 
</html>