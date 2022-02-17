<?php 

include('database.php');

function show_todoList()
{
    global $db;
        $query = 'SELECT * FROM todoitems';
    $stmt = $db->prepare($query);
    $stmt->execute();
    $items = $stmt->fetchAll();
    $stmt->closeCursor();
    return $items;
}

$errors = "";
$results = show_todoList();

$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW);
if(!$action){
    $action = filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW);
    if(!$action){
        $action = 'create_read_form';
    }
}

if (isset($delete)) {
    echo "Item Deleted. <br>";
}
if (isset($insert)) {
    echo "Item Added. <br>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
	<div class="heading">
		<h2>To-Do List</h2>
	</div>
	<form method="post" action="insert_item.php" class="input_form">
        <?php if (isset($errors)) { ?>
            <p><?php echo $errors; ?></p>
        <?php } ?>

        <labael for='title'>Title:</label>
        <input type="text" name="title" class="title">
		<labael for='description'>Description:</label>
        <input type="text" name="description" class="description">
		<button type="submit" name="submit" id="add" class="add">Add Item</button>
	</form>

    <?php
    if (!$results) { ?>
        <li class="list">
            <h4>Your To-Do List is currently empty.</h4>
            <p>Add some above.</p>        
        </li>

    
    <?php } else { ?>
        <?php foreach($results as $item): ?>
            <ul class="item"><h4><?php echo $results['Title']?></h4>
                <p><?php echo $item['Description'] ?></p>
                <form action="delete_item.php" method="POST" id="delete_item">
                    <input type="hidden" name="id" id="id" value="<?php echo $item['ItemNum']; ?>">
                    <button class="delete" type="submit" name="action" value="delete_item">X</button>
                </form>
        </ul>
        <?php endforeach ; ?>
    <?php } ?>
    
</body>
</html>