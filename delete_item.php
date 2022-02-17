<?php 
require('database.php');

$id = filter_input(INPUT_POST, 'id', FILTER_UNSAFE_RAW);

if($id) {
    $query = 'DELETE FROM todoitems
                WHERE itemNum = :id';
                $stmt = $db->prepare($query);
                $stmt->bindValue(':id', $id);
                $success = $stmt->execute();
                $stmt->closeCursor();
}

$delete = true;
include('index.php');
?>