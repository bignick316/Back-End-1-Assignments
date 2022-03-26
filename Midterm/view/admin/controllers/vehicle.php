<?php
    switch($action) {
        case 'show_insert_vehicle':
            insert_vehicle($year, $model, $price, $type_id, $class_id, $make_id);
            header('Location: .?action=insert_vehicle');
            break;
        case 'delete_vehicle':
            delete_vehicle($id);
            header('Location: .?action=show_insert_vehicle');

        case 'insert_vehicle':
            include('C:\xampp\htdocs\Week 2\Midterm\View\admin\add_vehicle_form.php');

        default:
            break;

    }
?>