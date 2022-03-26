<?php
    switch($action) {
        case 'insert_class':
            class_db::insert_class($class);
            header('Location: .?action=edit_class');
            break;
        case 'delete_class':
            class_db::delete_class($class_id);
            header('Location: .?action=edit_class');

        case 'edit_class':
            include('C:\xampp\htdocs\Week 2\Midterm\View\admin\class_list.php');

        default:
            break;
            
    }
?>