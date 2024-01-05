<?php
require_once 'C:\xampp\htdocs\pnsmapi\connect.php';

class EspecesDetails {

    public function getAll() {
        $conect = connectDB();
        $result = $conect->query('SELECT * FROM especesdetails');
        $especesdetailsItems = $result->fetch_all(MYSQLI_ASSOC);
        $conect->close();
        return $especesdetailsItems;
    }
    public function getById($id) {
        $conect = connectDB();
        $result = $conect->query("SELECT * FROM especesdetails WHERE id = $id");
        
        if ($result->num_rows > 0) {
            $especesdetailsItems = $result->fetch_assoc();
            $conect->close();
            return $especesdetailsItems;
        } else {
            $conect->close();
            return null;
        }
    }
    public static function getId() {
        $conect = connectDB();
        $result = $conect->query('SELECT idType FROM especes');
        $especes = $result->fetch_all(MYSQLI_ASSOC);
        
        $conect->close();
        return $especes;
    }
    public static function getIddetails() {
        $conect = connectDB();
        $result = $conect->query('SELECT id FROM especesdetails');
        $especesdetailsItems = $result->fetch_all(MYSQLI_ASSOC);
        
        $conect->close();
        return $especesdetailsItems;
    }

    public function update($id, $data) {
        $conect = connectDB();
        $idType = $conect->real_escape_string($data['idType']);
        $name = $conect->real_escape_string($data['name']);
        $desc = $conect->real_escape_string($data['desc']);
        $subDesc = $conect->real_escape_string($data['subDesc']);
        $image = $conect->real_escape_string($data['image']);
        $color = $conect->real_escape_string($data['color']);
        

        echo "hello from model";
        print_r($data);
        echo "<br>";
        $conect->query("UPDATE `especesdetails` SET `idType`='$idType', `name`='$name', `desc`='$desc', `subDesc`='$subDesc',
        `image`='$image', `color`='$color' WHERE `id` = $id");
        $conect->close();
    }

    public function delete($id) {
        $conect = connectDB();
        $conect->query("DELETE FROM especesdetails WHERE id = $id");
        $conect->close();
    }
    public function create($data) {
        $conect = connectDB();
        $idType = $data['idType'];
        $name = $data['name'];
        $desc = $data['desc'];
        $subDesc = $data['subDesc'];
        $image = $data['image'];
        $color = $data['color'];


        echo "hello from model";
        print_r($data);
        echo "<br>";
        $conect->query("INSERT INTO `especesdetails` (`idType`, `name`, `desc`, `subDesc`, `image`, `color`)
        VALUES ('$idType', '$name', '$desc', '$subDesc', '$image', '$color')");
        $conect->close();
    }
    public function GetMerge(){
        $conect = connectDB();
        $result = $conect->query('SELECT especes.*, especesdetails.* 
        FROM especes LEFT JOIN especesdetails 
        ON especes.idType = especesdetails.idType');
        $especesdetailsItems = array();
        while ($row = $result->fetch_assoc()) {
            $especesdetailsItems = array(
                'espece' => $row['espece'],
                'image' => $row['image'],
                'type' => $row['type'],
                'especesdetails' => array(
                    'idType' => $row['idType'],
                    'name' => $row['name'],
                    'desc' => $row['desc'],
                    'subDesc' => $row['subDesc'],
                    'image' => $row['image'],
                    'color' => $row['color'],
                ),
            );
            $especes[] = $especesdetailsItems;
        }
        // $especesdetailsItems = $result->fetch_all(MYSQLI_ASSOC);
        $conect->close();
        return $especes;
    }


}
