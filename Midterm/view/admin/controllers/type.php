<?php
    switch($action) {
        case 'insert_type':
            type_db::insert_type($type);
            header('Location: .?action=edit_type');
            break;
        case 'delete_type':
            type_db::delete_type($type_id);
            header('Location: .?action=edit_type');

        case 'edit_type':
            include('C:\xampp\htdocs\Week 2\Midterm\View\admin\type_list.php');

        default:
            break;
            
    }
?>