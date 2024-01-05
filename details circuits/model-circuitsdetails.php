<?php
require_once 'C:\xampp\htdocs\pnsmapi\connect.php';

class CircuitDetails {

    public function getAll() {
        $conect = connectDB();
        $result = $conect->query('SELECT * FROM circuitsdetails');
        $circuitsdetailsItems = $result->fetch_all(MYSQLI_ASSOC);
        $conect->close();
        return $circuitsdetailsItems;
    }
    public function getById($id) {
        $conect = connectDB();
        $result = $conect->query("SELECT * FROM circuitsdetails WHERE id = $id");
        
        if ($result->num_rows > 0) {
            $circuitsdetailsItem = $result->fetch_assoc();
            $conect->close();
            return $circuitsdetailsItem;
        } else {
            $conect->close();
            return null;
        }
    }
    public static function getId() {
        $conect = connectDB();
        $result = $conect->query('SELECT idCircuit FROM circuits');
        $circuits = $result->fetch_all(MYSQLI_ASSOC);
        
        $conect->close();
        return $circuits;
    }
    public static function getIddetails() {
        $conect = connectDB();
        $result = $conect->query('SELECT id FROM circuitsdetails');
        $circuitsdetails = $result->fetch_all(MYSQLI_ASSOC);
        
        $conect->close();
        return $circuitsdetails;
    }

    public function update($id, $data) {
        $conect = connectDB();
        $idCircuits = $conect->real_escape_string($data['idCircuits']);
        $title = $conect->real_escape_string($data['title']);
        $desc = $conect->real_escape_string($data['desc']);
        $tel = $conect->real_escape_string($data['tel']);
        $email = $conect->real_escape_string($data['email']);
        $pinmap = $conect->real_escape_string($data['pinmap']);
        $image = $conect->real_escape_string($data['image']);
        

        echo "hello from model";
        print_r($data);
        echo "<br>";
        $conect->query("UPDATE `circuitsdetails` SET `idCircuits`='$idCircuits', `title`='$title', `desc`='$desc', `tel`='$tel',
        `email`='$email', `pinmap`='$pinmap', `image`='$image' WHERE `id`=$id");
        $conect->close();
    }

    public function delete($id) {
        $conect = connectDB();
        $conect->query("DELETE FROM circuitsdetails WHERE id = $id");
        $conect->close();
    }
    public function create($data) {
        $conect = connectDB();
        $idCircuits = $data['idCircuits'];
        $title = $data['title'];
        $desc = $data['desc'];
        $tel = $data['tel'];
        $email = $data['email'];
        $pinmap = $data['pinmap'];
        $image = $data['image'];


        echo "hello from model";
        print_r($data);
        echo "<br>";

        $conect->query("INSERT INTO `circuitsdetails` (`idCircuits`, `title`, `desc`, `tel`, `email`, `pinmap`, `image`)
        VALUES ('$idCircuits', '$title', '$desc', '$tel', '$email', '$pinmap', '$image')");
        $conect->close();
    }

}
