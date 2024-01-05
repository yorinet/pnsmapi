<?php

// Include the PHP files
require_once 'controller-circuitsdetails.php';
require_once 'C:\xampp\htdocs\pnsmapi\config.php';

// Create an instance of the Controller
$controllerdetails = new ControllerDetails();

// Handle form submissions for testing
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['test_action'])) {
        switch ($_POST['test_action']) {
            case 'GET_ALL':
                $controllerdetails->getCircuitDetailsAll();
                break;
            case 'GET_BY_ID':
                if (isset($_POST['id'])) {
                    $controllerdetails->getCircuitDetailsById($_POST['id']);
                }
                break;
            case 'CREATE':
                if (isset($_POST['idCircuits']) && isset($_POST['title']) && isset($_POST['desc']) && isset($_POST['tel'])&& isset($_POST['email']) && isset($_POST['pinmap']) && isset($_POST['image'])) {
                    $data = [
                        'idCircuits' => $_POST['idCircuits'],
                        'title' => $_POST['title'],
                        'desc' => $_POST['desc'],
                        'tel' => $_POST['tel'],
                        'email' => $_POST['email'],
                        'pinmap' => $_POST['pinmap'],
                        'image' => $_POST['image']
                    ];
                    echo "hello from router";
                    print_r($data);
                    echo "<br>";
                    $controllerdetails->createCircuitDetails($data);
                }
                break;
            case 'UPDATE':
                if (isset($_POST['id']) && isset($_POST['idCircuits']) && isset($_POST['title']) && isset($_POST['desc']) && isset($_POST['tel'])&& isset($_POST['email']) && isset($_POST['pinmap']) && isset($_POST['image'])) {
                    $id = $_POST['id'];
                    $data = [
                        'idCircuits' => $_POST['idCircuits'],
                        'title' => $_POST['title'],
                        'desc' => $_POST['desc'],
                        'tel' => $_POST['tel'],
                        'email' => $_POST['email'],
                        'pinmap' => $_POST['pinmap'],
                        'image' => $_POST['image']
                    ];
                    echo "hello from router";
                    print_r($data);
                    echo "<br>";
                    $controllerdetails->updateCircuitDetails($id, $data);
                }
                break;
            case 'DELETE':
                if (isset($_POST['id'])) {
                    $id = $_POST['id'];
                    $controllerdetails->deleteCircuitDetails($id);
                }
                break;
        }
    }
}