<?php
require("C:/xampp/htdocs/Week 2/ToDo-List/model/database.php");
global $db;
$query = "SELECT * FROM categories ORDER BY categoryID";
$stmt = $db->prepare($query);
$stmt->execute();
$items = $stmt->fetchAll();
$stmt->closeCursor();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My ToDo-List</title>
    <link rel="stylesheet" type="text/css" href="C:/xampp/htdocs/Week 2/ToDo-List/view/css/main.css">
</head>
<body>
    <header><h1>List Manager</h1></header>    
    <main>
        <h1>Add Item</h1>
        <form action="category_db.php" method="post" id="add_item_form">
            <label>Category: </label>
            <select name="category_id">
                <?php foreach ($categories as $category) : ?>
                    <option value="<?php echo $category["categoryID"]; ?>">
                        <?php echo $category["categoryName"]; ?>
                    </option>
                <?php endforeach; ?>
            </select><br>
            <label>Title: </label>
            <input type="text" name="title"><br>

            <label>Description: </label>
            <input type="text" name="description"><br>

            <label>Category Name: </label>
            <input type="text" name="categoryName"><br>
        </form>
        <p><a href="index.php">View ToDo-List</a></p>
    </main>
</body>
</html>