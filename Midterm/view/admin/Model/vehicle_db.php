<?php

class vehicle_db {

    public static function get_vehicles_by_make($make_id) {
        global $db;
        if ($make_id) {
            $query = "SELECT v.id, v.year, m.make, v.model, t.type, c.class, v.price FROM vehicles v 
                        LEFT JOIN types t ON v.type_id = t.type_id 
                            LEFT JOIN makes m ON v.make_id = m.make_id 
                                LEFT JOIN classes c ON v.class_id = c.class_id 
                                WHERE v.make_id = :make_id ORDER BY price DESC, t.type, c.class";
        } else {
            $query = "SELECT v.id, v.year, m.make, v.model, t.type, c.class, v.price FROM vehicles v 
                        LEFT JOIN types t ON v.type_id = t.type_id 
                            LEFT JOIN makes m ON v.make_id = m.make_id 
                                LEFT JOIN classes c ON v.class_id = c.class_id
                                    ORDER BY price DESC, t.type, c.class";
        }
        $stmt = $db->prepare($query);
        if ($make_id) {
            $stmt->bindValue(":make_id", $make_id);
        }
        $stmt->execute();
        $vehicles = $stmt->fetchAll();
        $stmt->closeCursor();
        return $vehicles;
    }

    public static function get_vehicles_by_type($type_id) {
        global $db;
        if ($type_id) {
            $query = "SELECT v.id, v.year, m.make, v.model, t.type, c.class, v.price FROM vehicles v 
            LEFT JOIN types t ON v.type_id = t.type_id 
                LEFT JOIN makes m ON v.make_id = m.make_id 
                    LEFT JOIN classes c ON v.class_id = c.class_id
                        WHERE v.type_id = :type_id ORDER BY price DESC, m.make, c.class";
        } else {
            $query = "SELECT v.id, v.year, m.make, v.model, t.type, c.class, v.price FROM vehicles v 
            LEFT JOIN types t ON v.type_id = t.type_id 
                LEFT JOIN makes m ON v.make_id = m.make_id 
                    LEFT JOIN classes c ON v.class_id = c.class_id
                        ORDER BY price DESC, m.make, c.class";
        }
        $stmt = $db->prepare($query);
        if ($type_id) {
            $stmt->bindValue(":type_id", $type_id);
        }
        $stmt->execute();
        $vehicles = $stmt->fetchAll();
        $stmt->closeCursor();
        return $vehicles;
    }

    public static function get_vehicles_by_class($class_id) {
        global $db;
        if ($class_id) {
            $query = "SELECT v.id, v.year, m.make, v.model, t.type, c.class, v.price FROM vehicles v 
            LEFT JOIN types t ON v.type_id = t.type_id 
                LEFT JOIN makes m ON v.make_id = m.make_id 
                    LEFT JOIN classes c ON v.class_id = c.class_id
                        WHERE v.class_id = :class_id ORDER BY price DESC, m.make, t.type";
        } else {
            $query = "SELECT v.id, v.year, m.make, v.model, t.type, c.class, v.price FROM vehicles v 
            LEFT JOIN types t ON v.type_id = t.type_id 
                LEFT JOIN makes m ON v.make_id = m.make_id 
                    LEFT JOIN classes c ON v.class_id = c.class_id
                        ORDER BY price DESC, m.make, t.type";
        }
        $stmt = $db->prepare($query);
        if ($class_id) {
            $stmt->bindValue(":class_id", $class_id);
        }
        $stmt->execute();
        $vehicles = $stmt->fetchAll();
        $stmt->closeCursor();
        return $vehicles;
    }

    public static function get_vehicles_by_year() {
        global $db;
        $query = "SELECT v.id, v.year, m.make, v.model, t.type, c.class, v.price FROM vehicles v 
                    LEFT JOIN types t ON v.type_id = t.type_id 
                        LEFT JOIN makes m ON v.make_id = m.make_id 
                            LEFT JOIN classes c ON v.class_id = c.class_id
                                ORDER BY year DESC";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $vehicles = $stmt->fetchAll();
        $stmt->closeCursor();
        return $vehicles;
    }

    public static function get_vehicles_by_price() {
        global $db;
        $query = "SELECT v.id, v.year, m.make, v.model, t.type, c.class, v.price FROM vehicles v 
                    LEFT JOIN types t ON v.type_id = t.type_id 
                        LEFT JOIN makes m ON v.make_id = m.make_id 
                            LEFT JOIN classes c ON v.class_id = c.class_id
                                ORDER BY price DESC";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $vehicles = $stmt->fetchAll();
        $stmt->closeCursor();
        return $vehicles;
    }

    public static function delete_vehicle($vehicle_id) {
        global $db;
        $query = 'DELETE FROM vehicles
                    WHERE id = :vehicle_id';
        $stmt = $db->prepare($query);
        $stmt->bindValue(':vehicle_id', $vehicle_id);
        $stmt->execute();
        $stmt->closeCursor();
    }

    public static function insert_vehicle($year, $model, $price, $type_id, $class_id, $make_id) {
        global $db;
        $query = 'INSERT INTO vehicles
                        (year, model, price, type_id, class_id, make_id)
                            VALUES 
                                (:year, :model, :price, :type_id, :class_id, :make_id)';
        $stmt = $db->prepare($query);
        $stmt->bindValue(':year', $year);
        $stmt->bindValue(':model', $model);
        $stmt->bindValue(':price', $price);
        $stmt->bindValue(':type_id', $type_id);
        $stmt->bindValue(':class_id', $class_id);
        $stmt->bindValue(':make_id', $make_id);
        $stmt->execute();
        $stmt->closeCursor();
    }

}
?>