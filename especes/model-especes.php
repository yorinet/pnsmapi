<?php
require_once 'C:\xampp\htdocs\pnsmapi\connect.php';

class Especes {

    public function getAll() {
        $conect = connectDB();
        $result = $conect->query('SELECT * FROM especes');
        $especesItems = $result->fetch_all(MYSQLI_ASSOC);
        $conect->close();
        return $especesItems;
    }
    public function getById($id) {
        $conect = connectDB();
        $result = $conect->query("SELECT * FROM especes WHERE idType = $id");
        
        if ($result->num_rows > 0) {
            $especesItems = $result->fetch_assoc();
            $conect->close();
            return $especesItems;
        } else {
            $conect->close();
            return null;
        }
    }
    public static function getId() {
        $conect = connectDB();
        $result = $conect->query('SELECT idType FROM especes');
        $especesId = $result->fetch_all(MYSQLI_ASSOC);
        
        $conect->close();
        return $especesId;
    }

    public function update($id, $data) {
        $conect = connectDB();
        $espece = $conect->real_escape_string($data['espece']);
        $image = $conect->real_escape_string($data['image']);
        $type = $conect->real_escape_string($data['type']);
        


        echo "hello from model";
        print_r($data);
        echo "<br>";
        $conect->query("UPDATE especes SET espece='$espece', `image`='$image', `type`='$type' WHERE idType=$id");
        $conect->close();
    }

    public function delete($id) {
        $conect = connectDB();
        $conect->query("DELETE FROM especes WHERE idType = $id");
        $conect->close();
    }
    public function create($data) {
        $conect = connectDB();
        $espece = $data['espece'];
        $image = $data['image'];
        $type = $data['type'];


        echo "hello from model";
        print_r($data);
        echo "<br>";
        $conect->query("INSERT INTO especes(`espece`, `image`, `type`) VALUES ('$espece', '$image', '$type')");
        $conect->close();
    }

}
