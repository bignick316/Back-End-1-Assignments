<?php
    switch($action) {
        case 'insert_make':
            make_db::insert_make($make);
            header('Location: .?action=edit_make');
            break;
        case 'delete_make':
            make_db::delete_make($make_id);
            header('Location: .?action=edit_make');

        case 'edit_make':
            include('C:\xampp\htdocs\Week 2\Midterm\View\admin\make_list.php');

        default:
            break;
            
    }
?>