<?php
require("model/database.php");
require("model/item_db.php");
require("model/category_db.php");

$item_id = filter_input(INPUT_POST, 'item_id', FILTER_VALIDATE_INT);
$item_name = filter_input(INPUT_POST, 'item_name', FILTER_UNSAFE_RAW);
$item_description = filter_input(INPUT_POST, 'item_description', FILTER_UNSAFE_RAW);
$category_name = filter_input(INPUT_POST, 'category_name', FILTER_UNSAFE_RAW);

$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
if (!$category_id) {
    $category_id = filter_input(INPUT_POST, 'cateogry_id', FILTER_VALIDATE_INT);
}

$action = filter_input(INPUT_POST, 'action', FILTER_VALIDATE_INT);
if (!$action) {
    $action = filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW);
    if (!$action) {
        $action = "list_items";
    }
}

switch ($action) {
    case "list_categories":
        $categories = get_categories();
        include('view/category_list.php');
        break;
    case "add_category":
        add_category($category_name);
        header("Location: .?action=list_items");
        break;
    case "add_item":
        if ($item_name && $item_description && $category_id) {
            add_item($item_name, $item_description, $category_id);
            header("Location: .?category_id=$category_id");
        } else {
            $error = "Invalid input. Try again.";
            include('view/error.php');
            exit();
        }
        break;
    case "delete_category":
        if ($category_id) {
            try {
                delete_category($category_id);
            }
            catch (PDOException $e){
                $error = "You cannot delete a category if it already has items for it.";
                include('view/error.php');
                exit();
            }
            header("Location: .?action=list_items");
        }
        break;
    case "delete_item":
        if ($item_id) {
            delete_item($item_id);
            header("Location: .?category_id=$category_id");
        } else {
            $error = "Missing or incorrect item id.";
            include('view/error.php'); 
        }
        break;
    default:
        $category_name = get_category_name($category_id);
        $categories = get_categories();
        $items = get_items_by_category($category_id);
        include('view/item_list.php');

}
?>