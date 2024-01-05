<?php
require_once 'C:\xampp\htdocs\pnsmapi\connect.php';

class Presentation {

    public function getAll() {
        $conect = connectDB();
        $result = $conect->query('SELECT * FROM presentation');
        $PresentationItems = $result->fetch_all(MYSQLI_ASSOC);
        $conect->close();
        return $PresentationItems;
    }
    public function getById($id) {
        $conect = connectDB();
        $result = $conect->query("SELECT * FROM presentation WHERE id = $id");
        
        if ($result->num_rows > 0) {
            $PresentationItems = $result->fetch_assoc();
            $conect->close();
            return $PresentationItems;
        } else {
            $conect->close();
            return null;
        }
    }
    public static function getId() {
        $conect = connectDB();
        $result = $conect->query('SELECT id FROM presentation');
        $PresentationId = $result->fetch_all(MYSQLI_ASSOC);
        
        $conect->close();
        return $PresentationId;
    }

    public function update($id, $data) {
        $conect = connectDB();
        $title = $conect->real_escape_string($data['title']);
        $subtitle = $conect->real_escape_string($data['subtitle']);
        $description = $conect->real_escape_string($data['description']);
        $image = $conect->real_escape_string($data['image']);



        echo "hello from model";
        print_r($data);
        echo "<br>";
        $conect->query("UPDATE `presentation` SET `title`='$title', `subtitle`='$subtitle', `description`='$description',
        `image`='$image' WHERE `id`=$id");
        $conect->close();
    }

    public function delete($id) {
        $conect = connectDB();
        $conect->query("DELETE FROM presentation WHERE id = $id");
        $conect->close();
    }
    public function create($data) {
        $conect = connectDB();
        $title = $data['title'];
        $subtitle = $data['subtitle'];
        $description = $data['description'];
        $image = $data['image'];


        echo "hello from model";
        print_r($data);
        echo "<br>";
        $conect->query("INSERT INTO `presentation` (`title`, `subtitle`, `description`, `image`)
        VALUES ('$title', '$subtitle', '$description', '$image')");
        $conect->close();
    }

}
