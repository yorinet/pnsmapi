<?php
require_once 'C:\xampp\htdocs\pnsmapi\connect.php';

class Localisation {

    public function getAll() {
        $conect = connectDB();
        $result = $conect->query('SELECT * FROM localisation');
        $localisationItems = $result->fetch_all(MYSQLI_ASSOC);
        $conect->close();
        return $localisationItems;
    }
    public function getById($id) {
        $conect = connectDB();
        $result = $conect->query("SELECT * FROM localisation WHERE id = $id");
        
        if ($result->num_rows > 0) {
            $localisationItems = $result->fetch_assoc();
            $conect->close();
            return $localisationItems;
        } else {
            $conect->close();
            return null;
        }
    }
    public static function getId() {
        $conect = connectDB();
        $result = $conect->query('SELECT id FROM localisation');
        $localisationId = $result->fetch_all(MYSQLI_ASSOC);
        
        $conect->close();
        return $localisationId;
    }

    public function update($id, $data) {
        $conect = connectDB();
        $title = $conect->real_escape_string($data['title']);
        $subtitle = $conect->real_escape_string($data['subtitle']);
        $description = $conect->real_escape_string($data['description']);
        $pinmap = $conect->real_escape_string($data['pinmap']);
        $image = $conect->real_escape_string($data['image']);



        echo "hello from model";
        print_r($data);
        echo "<br>";
        $conect->query("UPDATE `localisation` SET `title`='$title', `subtitle`='$subtitle', `description`='$description', `pinmap`='$pinmap',
        `image`='$image' WHERE `id`=$id");
        $conect->close();
    }

    public function delete($id) {
        $conect = connectDB();
        $conect->query("DELETE FROM localisation WHERE id = $id");
        $conect->close();
    }
    public function create($data) {
        $conect = connectDB();
        $title = $data['title'];
        $subtitle = $data['subtitle'];
        $description = $data['description'];
        $pinmap = $data['pinmap'];
        $image = $data['image'];


        echo "hello from model";
        print_r($data);
        echo "<br>";
        $conect->query("INSERT INTO `localisation` (`title`, `subtitle`, `description`, `pinmap`, `image`)
        VALUES ('$title', '$subtitle', '$description', '$pinmap', '$image')");
        $conect->close();
    }

}
