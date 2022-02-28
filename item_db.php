<?php 

function get_items_by_category($category_id) {
    global $db;
    if ($category_id == NULL || $category_id == FALSE) {
        $query = "SELECT * FROM todoitems ORDER BY ItemNum";
    } else {
        $query = "SELECT * FROM todoitems 
                    WHERE todoitems.categoryID = :category_id
                        ORDER BY ItemNum";
    }
    $stmt = $db->prepare($query);
    $stmt->bindValue(":category_id", $category_id);
    $stmt->execute();
    $items = $stmt->fetchAll();
    $stmt->closeCursor();
    return $items;
}

function get_item($id) {
    global $db;
    $query = "SELECT * FROM todoitems
                WHERE ItemNum= :id";
    $stmt = $db->prepare($query);
    $stmt->bindValue(":id", $id);
    $stmt->execute();
    $item = $stmt->fetch();
    $stmt->closeCursor();
    return $item;
}

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