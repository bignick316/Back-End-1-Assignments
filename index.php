<?php
require("C:/xampp/htdocs/Week 2/ToDo-List/model/database.php");
require("C:/xampp/htdocs/Week 2/ToDo-List/model/item_db.php");
require("C:/xampp/htdocs/Week 2/ToDo-List/model/category_db.php");

$action = filter_input(INPUT_POST, "action");
if ($action == NULL) {
    $action = filter_input(INPUT_GET, "action");
    if ($action == NULL) {
        $action = "list_items";
    }
}

if ($action == "list_items") {
    $category_id = filter_input(INPUT_GET, "category_id", FILTER_UNSAFE_RAW);
    if ($category_id == NULL || $category_id == FALSE) {
        $category_id = 1;
    }
    $category_name = get_category_name($category_id);
    $categories = get_categories();
    $items = get_items_by_category($category_id);
    include('C:/xampp/htdocs/Week 2/ToDo-List/view/item_list.php');
}
else if ($action == 'delete_item') {
    $item_id = filter_input(INPUT_POST, 'item_id', FILTER_UNSAFE_RAW);
    $category_id = filter_input(INPUT_POST, 'category_id', FILTER_UNSAFE_RAW);
    if ($category_id == NULL || $category_id == FALSE || $item_id == NULL || $item_id == FALSE) {
        $error = "Missing or incorrect item id or category id.";
        include("../view/error.php");
    }
    else {
        delete_item($item_id);
        header("Location: .?category_id=$category_id");
    }    
}
else if ($action == "add_item_form") {
    $categories = get_categories();
    include("C:/xampp/htdocs/Week 2/ToDo-List/model/add_item_form.php");
}
else if ($action == "add_item") {
    $category_id = filter_input(INPUT_POST, "category_id", FILTER_UNSAFE_RAW);
    //$category_name = filter_input(INPUT_POST, "category_name", FILTER_UNSAFE_RAW);
    $item_name = filter_input(INPUT_POST, "item_name", FILTER_UNSAFE_RAW);
    $item_description = filter_input(INPUT_POST, "item_description", FILTER_UNSAFE_RAW);
    if ($category_id == NULL || $category_id == FALSE || /*$category_name == NULL || $category_name == FALSE ||*/
             $item_name == NULL || $item_name == FALSE || $item_description == NULL || $item_description == FALSE) {
        $error = "Invalid item data. Double check your input and try again.";
        include("../view/error.php");
    }
    else {
        add_item($item_name, $item_description, $category_id);
        header("Location: .?category_id=$category_id");
    }
    
}
?>