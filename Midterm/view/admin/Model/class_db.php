<?php
class class_db {
    public static function get_classes() {
        global $db;
        $query = 'SELECT * FROM classes';
        $stmt = $db->prepare($query);
        $stmt->execute();
        $classes = $stmt->fetchAll();
        $stmt->closeCursor();
        return $classes;
    }

    public static function delete_class($class_id) {
        global $db;
        $query = 'DELETE FROM classes
                    WHERE calss_id = :class_id';
        $stmt = $db->prepare($query);
        $stmt->bindValue(':class_id', $class_id);
        $stmt->execute();
        $stmt->closeCursor();
    }

    public static function insert_class($class_name) {
        global $db;
        $query = 'INSERT INTO classes
                        (class)
                            VALUES 
                                (:class_name)';
        $stmt = $db->prepare($query);
        $stmt->bindValue(':class_name', $class_name);
        $stmt->execute();
        $stmt->closeCursor();
    }
}

?>