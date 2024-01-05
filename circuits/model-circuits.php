<?php
require_once 'C:\xampp\htdocs\pnsmapi\connect.php';

class Circuit {

    public function getAll() {
        $conect = connectDB();
        $result = $conect->query('SELECT * FROM circuits');
        $circuitItems = $result->fetch_all(MYSQLI_ASSOC);
        $conect->close();
        return $circuitItems;
    }
    public function getById($id) {
        $conect = connectDB();
        $result = $conect->query("SELECT * FROM circuits WHERE idCircuit = $id");
        
        if ($result->num_rows > 0) {
            $circuitItem = $result->fetch_assoc();
            $conect->close();
            return $circuitItem;
        } else {
            $conect->close();
            return null;
        }
    }
    public static function getId() {
        $conect = connectDB();
        $result = $conect->query('SELECT idCircuit FROM circuits');
        $circuitId = $result->fetch_all(MYSQLI_ASSOC);
        
        $conect->close();
        return $circuitId;
    }

    public function update($id, $data) {
        $conect = connectDB();
        $title = $conect->real_escape_string($data['title']);
        $subTitle = $conect->real_escape_string($data['subTitle']);
        $icon = $conect->real_escape_string($data['icon']);
        


        echo "hello from model";
        print_r($data);
        echo "<br>";
        $conect->query("UPDATE circuits SET title='$title', subTitle='$subTitle', icon='$icon' WHERE idCircuit=$id");
        $conect->close();
    }

    public function delete($id) {
        $conect = connectDB();
        $conect->query("DELETE FROM circuits WHERE idCircuit = $id");
        $conect->close();
    }
    public function create($data) {
        $conect = connectDB();
        $title = $data['title'];
        $subTitle = $data['subTitle'];
        $icon = $data['icon'];


        echo "hello from model";
        print_r($data);
        echo "<br>";
        $conect->query("INSERT INTO circuits(title, subTitle, icon) VALUES ('$title', '$subTitle', '$icon')");
        $conect->close();
    }

}
