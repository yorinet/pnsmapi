<?php
require_once 'controller-circuits.php';

$controller = new Controller();

// Router Circuits
if (isset($_GET['circuits'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['id'])) {
            // Get By ID send to Controller
            $controller->getCircuitById($_GET['id']);
        } else {
            // Get all send to Controller
            $controller->getCircuitAll();
        }
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);
        // Create send to Controller
        $controller->createCircuit($data);
    } elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
        parse_str(file_get_contents('php://input'), $data);
        $id = $data['id'];
        unset($data['id']);
        // Update send to Controller
        $controller->updateCircuit($id, $data);
    } elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
        parse_str(file_get_contents('php://input'), $data);
        $id = $data['id'];
        // Delete send to Controller
        $controller->deleteCircuit($id);
    }
}