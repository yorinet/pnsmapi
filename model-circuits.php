<?php
require_once 'connect.php';

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
    public function update($id, $data) {
        $conect = connectDB();
        $name = $data['name'];
        $description = $data['description'];
        $conect->query("UPDATE circuits SET name='$name', description='$description' WHERE idCircuit=$id");
        $conect->close();
    }

    public function delete($id) {
        $conect = connectDB();
        $conect->query("DELETE FROM circuits WHERE idCircuit = $id");
        $conect->close();
    }
    public function create($data) {
        $conect = connectDB();
        $name = $data['name'];
        $description = $data['description'];
        $conect->query("INSERT INTO circuits (name, description) VALUES ('$name', '$description')");
        $conect->close();
    }

}
