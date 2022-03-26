<?php
require("model/database.php");
require("model/class_db.php");
require("model/make_db.php");
require("model/type_db.php");
require("model/vehicle_db.php");

$year = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT);
if (!$year) {
    $year = filter_input(INPUT_GET, 'year', FILTER_VALIDATE_INT);
}
$model = filter_input(INPUT_POST, 'model', FILTER_UNSAFE_RAW);
if (!$model) {
    $model = filter_input(INPUT_GET, 'model', FILTER_UNSAFE_RAW);
}
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_INT);
if (!$price) {
    $price = filter_input(INPUT_GET, 'price', FILTER_VALIDATE_INT);
}
$class = filter_input(INPUT_POST, 'class', FILTER_UNSAFE_RAW);
if (!$class) {
    $class = filter_input(INPUT_GET, 'class', FILTER_UNSAFE_RAW);
}
$make = filter_input(INPUT_POST, 'make', FILTER_UNSAFE_RAW);
if (!$make) {
    $make = filter_input(INPUT_GET, 'make', FILTER_UNSAFE_RAW);
}
$type = filter_input(INPUT_POST, 'type', FILTER_UNSAFE_RAW);
if (!$type) {
    $type = filter_input(INPUT_GET, 'type', FILTER_UNSAFE_RAW);
}
$class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);
if (!$class_id) {
    $class_id = filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT);
}
$make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
if (!$make_id) {
    $make_id = filter_input(INPUT_GET, 'make_id', FILTER_VALIDATE_INT);
}
$type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
if (!$type_id) {
    $type_id = filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT);
}

$action = filter_input(INPUT_POST, 'action', FILTER_VALIDATE_INT);
if (!$action) {
    $action = filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW);
    if (!$action) {
        $action = "list_vehicles";
    }
}

if ($action == 'list_vehicles') {
    if ($type_id) {
        $vehicles = vehicle_db::get_vehicles_by_type($type_id);
    }
    else if ($make_id) {
        $vehicles = vehicle_db::get_vehicles_by_make($make_id);
    }
    else if ($class_id) {
        $vehicles = vehicle_db::get_vehicles_by_class($class_id);
    }
    else {
        if ($year) {
            $vehicles = vehicle_db::get_vehicles_by_year();
            $year = true;
        }
        else{
            $vehicles = vehicle_db::get_vehicles_by_price();
            $price = false;
        }
    }
    
    $types = type_db::get_types();
    $makes = make_db::get_makes();
    $classes = class_db::get_classes();
    include('C:\xampp\htdocs\Week 2\Midterm\View\vehicle_list.php');
}    

?>