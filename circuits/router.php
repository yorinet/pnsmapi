<?php

// Include the PHP files
require_once 'controller-circuits.php';
require_once 'C:\xampp\htdocs\pnsmapi\config.php';

// Create an instance of the Controller
$controller = new Controller();

// Handle form submissions for testing
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['test_action'])) {
        switch ($_POST['test_action']) {
            case 'GET_ALL':
                $controller->getCircuitAll();
                break;
            case 'GET_BY_ID':
                if (isset($_POST['id'])) {
                    $controller->getCircuitById($_POST['id']);
                }
                break;
            case 'CREATE':
                if (isset($_POST['title']) && isset($_POST['subTitle']) && isset($_POST['icon'])) {
                    $data = [
                        'title' => $_POST['title'],
                        'subTitle' => $_POST['subTitle'],
                        'icon' => $_POST['icon']
                    ];
                    echo "hello from router";
                    print_r($data);
                    echo "<br>";
                    $controller->createCircuit($data);
                }
                break;
            case 'UPDATE':
                if (isset($_POST['id']) && isset($_POST['title']) && isset($_POST['subTitle']) && isset($_POST['icon'])) {
                    $id = $_POST['id'];
                    $data = [
                        'title' => $_POST['title'],
                        'subTitle' => $_POST['subTitle'],
                        'icon' => $_POST['icon']
                    ];
                    echo "hello from router";
                    print_r($data);
                    echo "<br>";
                    $controller->updateCircuit($id, $data);
                }
                break;
            case 'DELETE':
                if (isset($_POST['id'])) {
                    $id = $_POST['id'];
                    $controller->deleteCircuit($id);
                }
                break;
        }
    }
}