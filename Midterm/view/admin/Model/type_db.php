<?php
class type_db {
    public static function get_types() {
        global $db;
        $query = 'SELECT * FROM types';
        $stmt = $db->prepare($query);
        $stmt->execute();
        $types = $stmt->fetchAll();
        $stmt->closeCursor();
        return $types;
    }

    public static function delete_type($type_id) {
        global $db;
        $query = 'DELETE FROM types
                    WHERE type_id = :type_id';
        $stmt = $db->prepare($query);
        $stmt->bindValue(':type_id', $type_id);
        $stmt->execute();
        $stmt->closeCursor();
    }

    public static function insert_type($type) {
        global $db;
        $query = 'INSERT INTO types
                        (type)
                            VALUES 
                                (:type)';
        $stmt = $db->prepare($query);
        $stmt->bindValue(':type', $type);
        $stmt->execute();
        $stmt->closeCursor();
    }
}
?>