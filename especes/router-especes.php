<?php

// Include the PHP files
require_once 'controller-especes.php';
require_once 'C:\xampp\htdocs\pnsmapi\config.php';

// Create an instance of the Controller
$controller = new Controller();

// Handle form submissions for testing
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['test_action'])) {
        switch ($_POST['test_action']) {
            case 'GET_ALL':
                $controller->getEspecesAll();
                break;
            case 'GET_BY_ID':
                if (isset($_POST['id'])) {
                    $controller->getEspecesById($_POST['id']);
                }
                break;
            case 'CREATE':
                if (isset($_POST['espece']) && isset($_POST['image']) && isset($_POST['type'])) {
                    $data = [
                        'espece' => $_POST['espece'],
                        'image' => $_POST['image'],
                        'type' => $_POST['type']
                    ];
                    echo "hello from router";
                    print_r($data);
                    echo "<br>";
                    $controller->createEspeces($data);
                }
                break;
            case 'UPDATE':
                if (isset($_POST['id']) && isset($_POST['espece']) && isset($_POST['image']) && isset($_POST['type'])) {
                    $id = $_POST['id'];
                    $data = [
                        'espece' => $_POST['espece'],
                        'image' => $_POST['image'],
                        'type' => $_POST['type']
                    ];
                    echo "hello from router";
                    print_r($data);
                    echo "<br>";
                    $controller->updateEspeces($id, $data);
                }
                break;
            case 'DELETE':
                if (isset($_POST['id'])) {
                    $id = $_POST['id'];
                    $controller->deleteEspeces($id);
                }
                break;
        }
    }
}