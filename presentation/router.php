<?php

// Include the PHP files
require_once 'controller-presentation.php';
require_once 'C:\xampp\htdocs\pnsmapi\config.php';

// Create an instance of the Controller
$controller = new Controller();

// Handle form submissions for testing
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['test_action'])) {
        switch ($_POST['test_action']) {
            case 'GET_ALL':
                $controller->getPresentationAll();
                break;
            case 'GET_BY_ID':
                if (isset($_POST['id'])) {
                    $controller->getPresentationById($_POST['id']);
                }
                break;
            case 'CREATE':
                if (isset($_POST['title']) && isset($_POST['subtitle']) && isset($_POST['description']) && isset($_POST['image'])) {
                    $data = [
                        'title' => $_POST['title'],
                        'subtitle' => $_POST['subtitle'],
                        'description' => $_POST['description'],
                        'image' => $_POST['image']
                    ];
                    echo "hello from router";
                    print_r($data);
                    echo "<br>";
                    $controller->createPresentation($data);
                }
                break;
            case 'UPDATE':
                if (isset($_POST['id']) && isset($_POST['title']) && isset($_POST['subtitle']) && isset($_POST['image'])) {
                    $id = $_POST['id'];
                    $data = [
                        'title' => $_POST['title'],
                        'subtitle' => $_POST['subtitle'],
                        'description' => $_POST['description'],
                        'image' => $_POST['image']
                    ];
                    echo "hello from router";
                    print_r($data);
                    echo "<br>";
                    $controller->updatePresentation($id, $data);
                }
                break;
            case 'DELETE':
                if (isset($_POST['id'])) {
                    $id = $_POST['id'];
                    $controller->deletePresentation($id);
                }
                break;
        }
    }
}