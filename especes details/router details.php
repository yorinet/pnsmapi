<?php

// Include the PHP files
require_once 'controller-especesdetails.php';
require_once 'C:\xampp\htdocs\pnsmapi\config.php';

// Create an instance of the Controller
$controllerdetails = new ControllerDetails();

// Handle form submissions for testing
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['test_action'])) {
        switch ($_POST['test_action']) {
            case 'GET_ALL':
                $controllerdetails->getEspecesDetailsAll();
                break;
            case 'MERGE':
                $controllerdetails->getEspecesDetailsMerge();
                break;
            case 'GET_BY_ID':
                if (isset($_POST['id'])) {
                    $controllerdetails->getEspecesDetailsById($_POST['id']);
                }
                break;
            case 'CREATE':
                if (isset($_POST['idType']) && isset($_POST['name']) && isset($_POST['desc']) && isset($_POST['subDesc'])&& isset($_POST['image']) && isset($_POST['color'])) {
                    $data = [
                        'idType' => $_POST['idType'],
                        'name' => $_POST['name'],
                        'desc' => $_POST['desc'],
                        'subDesc' => $_POST['subDesc'],
                        'image' => $_POST['image'],
                        'color' => $_POST['color']
                    ];
                    echo "hello from router";
                    print_r($data);
                    echo "<br>";
                    $controllerdetails->createEspecesDetails($data);
                }
                break;
            case 'UPDATE':
                if (isset($_POST['id']) && isset($_POST['idType']) && isset($_POST['name']) && isset($_POST['desc']) && isset($_POST['subDesc'])&& isset($_POST['image']) && isset($_POST['color'])) {
                    $id = $_POST['id'];
                    $data = [
                        'idType' => $_POST['idType'],
                        'name' => $_POST['name'],
                        'desc' => $_POST['desc'],
                        'subDesc' => $_POST['subDesc'],
                        'image' => $_POST['image'],
                        'color' => $_POST['color']
                    ];
                    echo "hello from router";
                    print_r($data);
                    echo "<br>";
                    $controllerdetails->updateEspecesDetails($id, $data);
                }
                break;
            case 'DELETE':
                if (isset($_POST['id'])) {
                    $id = $_POST['id'];
                    $controllerdetails->deleteEspecesDetails($id);
                }
                break;
        }
    }
}