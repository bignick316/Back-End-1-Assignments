<?php

function get_categories() {
    global $db;
    $query = "SELECT * FROM categories ORDER BY categoryID";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $categories = $stmt->fetchAll();
    $stmt->closeCursor();
    return $categories;
}

function get_category_name($category_id) {
    global $db;
    $query = "SELECT * FROM categories WHERE categoryID = :category_id";
    $stmt = $db->prepare($query);
    $stmt->bindValue(":category_id", $category_id);
    $stmt->execute();
    $category = $stmt->fetch();
    $stmt->closeCursor();
    $category_name = $category["categoryName"];
    return $category_name;
}

function delete_category($category_id) {
    global $db;
    $query = 'DELETE FROM categories
                WHERE categoryID = :category_id';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':category_id', $category_id);
    $stmt->execute();
    $stmt->closeCursor();
}

function add_category($category_name) {
    global $db;
    $query = 'INSERT INTO categories
                    (categoryName)
                        VALUES 
                            (:category_name)';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':category_name', $category_name);
    $stmt->execute();
    $stmt->closeCursor();
}
?>