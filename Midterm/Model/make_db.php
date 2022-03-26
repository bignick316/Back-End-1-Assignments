<?php

class make_db {

    public static function get_makes() {
        global $db;
        $q = "SELECT * FROM makes";
        $stmt = $db->prepare($q);
        $stmt->execute();
        $makes = $stmt->fetchALL();
        $stmt->closeCursor();
        return $makes;
    }

    public static function delete_make($make_id) {
        global $db;
        $query = 'DELETE FROM makes
                    WHERE make_id = :make_id';
        $stmt = $db->prepare($query);
        $stmt->bindValue(':make_id', $make_id);
        $stmt->execute();
        $stmt->closeCursor();
    }

    public static function insert_make($make) {
        global $db;
        $query = 'INSERT INTO makes
                        (make)
                            VALUES 
                                (:make)';
        $stmt = $db->prepare($query);
        $stmt->bindValue(':make', $make);
        $stmt->execute();
        $stmt->closeCursor();
    }
}
?>