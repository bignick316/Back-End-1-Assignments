<?php
require('database.php');


$title = filter_input(INPUT_POST, "title", FILTER_UNSAFE_RAW);
$description = filter_input(INPUT_POST, "description", FILTER_UNSAFE_RAW);

if(isset($title)) {
    if(empty($title)) {
        echo "You need to have a title for your item. <br>";
        $insert = false;
    } else {
        $query = 'INSERT INTO todoitems
                    (Title, Description)
                        VALUES 
                            (:title, :description)';
        $stmt = $db->prepare($query);
        $stmt->bindValue(':title', $title);
        $stmt->bindValue(':description', $description);
        if($stmt->execute()) {
            $count = $stmt->rowCount();
        }
        $stmt->closeCursor();
        $insert = true;
    }
} 
    

include('index.php');
?>