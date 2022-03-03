<?php 

function get_items_by_category($category_id) {
    global $db;
    if ($category_id) {
        $query = "SELECT i.ItemNum, i.Title, i.Description, c.categoryName FROM todoitems i 
                    LEFT JOIN categories c ON i.categoryID = c.categoryID 
                        WHERE i.categoryID = :category_id ORDER BY categoryName";
    } else {
        $query = "SELECT i.ItemNum, i.Title, i.Description, c.categoryName FROM todoitems i 
                    LEFT JOIN categories c ON i.categoryID = c.categoryID 
                        ORDER BY categoryName";
    }
    $stmt = $db->prepare($query);
    if ($category_id) {
        $stmt->bindValue(":category_id", $category_id);
    }
    $stmt->execute();
    $items = $stmt->fetchAll();
    $stmt->closeCursor();
    return $items;
}

// function get_item($id) {
//     global $db;
//     $query = "SELECT * FROM todoitems
//                 WHERE ItemNum= :id";
//     $stmt = $db->prepare($query);
//     $stmt->bindValue(":id", $id);
//     $stmt->execute();
//     $item = $stmt->fetch();
//     $stmt->closeCursor();
//     return $item;
// }

function delete_item($id) {
    global $db;
    $query = 'DELETE FROM todoitems
                WHERE itemNum = :id';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $stmt->closeCursor();
}

function add_item($title, $description, $category_id) {
    global $db;
    $query = 'INSERT INTO todoitems
                    (Title, Description, categoryID)
                        VALUES 
                            (:title, :description, :category_id)';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':title', $title);
    $stmt->bindValue(':description', $description);
    $stmt->bindValue(':category_id', $category_id);
    $stmt->execute();
    $stmt->closeCursor();
}

?>