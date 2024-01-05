<?php
require_once 'C:\xampp\htdocs\pnsmapi\connect.php';

class Pages {

    public function getAll() {
        $conect = connectDB();
        $result = $conect->query('SELECT * FROM pages');
        $pagesItems = $result->fetch_all(MYSQLI_ASSOC);
        $conect->close();
        return $pagesItems;
    }
    public function getById($id) {
        $conect = connectDB();
        $result = $conect->query("SELECT * FROM pages WHERE id = $id");
        
        if ($result->num_rows > 0) {
            $pagesItems = $result->fetch_assoc();
            $conect->close();
            return $pagesItems;
        } else {
            $conect->close();
            return null;
        }
    }
    public static function getId() {
        $conect = connectDB();
        $result = $conect->query('SELECT id FROM pages');
        $pagesId = $result->fetch_all(MYSQLI_ASSOC);
        
        $conect->close();
        return $pagesId;
    }

    public function update($id, $data) {
        $conect = connectDB();
        $page = $conect->real_escape_string($data['page']);
        $title = $conect->real_escape_string($data['title']);
        $subtitle = $conect->real_escape_string($data['subtitle']);
        $description = $conect->real_escape_string($data['description']);
        $icon = $conect->real_escape_string($data['icon']);
        $image = $conect->real_escape_string($data['image']);



        echo "hello from model";
        print_r($data);
        echo "<br>";
        $conect->query("UPDATE `pages` SET `page`='$page', `title`='$title', `subtitle`='$subtitle', `description`='$description', `icon`='$icon',
        `image`='$image' WHERE `id`=$id");
        $conect->close();
    }

    public function delete($id) {
        $conect = connectDB();
        $conect->query("DELETE FROM pages WHERE id = $id");
        $conect->close();
    }
    public function create($data) {
        $conect = connectDB();
        $page = $data['page'];
        $title = $data['title'];
        $subtitle = $data['subtitle'];
        $description = $data['description'];
        $icon = $data['icon'];
        $image = $data['image'];


        echo "hello from model";
        print_r($data);
        echo "<br>";
        $conect->query("INSERT INTO `pages` (`page`, `title`, `subtitle`, `description`, `icon`, `image`)
        VALUES ('$page', '$title', '$subtitle', '$description', '$icon', '$image')");
        $conect->close();
    }

}
