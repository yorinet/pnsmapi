<?php
require_once 'model-circuits.php';

class Controller {
    private $circuitModel;

    public function __construct() {
        $this->circuitModel = new Circuit();
    }

    private function sendResponse($statusCode, $data) {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function getCircuitAll() {
        $dataAll = $this->circuitModel->getAll();
        $this->sendResponse(200, $dataAll);
    }

    public function getCircuitById($id) {
        $dataById = $this->circuitModel->getById($id);

        if ($dataById) {
            $this->sendResponse(200, $dataById);
        } else {
            $this->sendResponse(404, ['error' => 'Item not found']);
        }
    }

    public function createCircuit($data) {
        echo "hello from controller";
        print_r($data);
        echo "<br>";
        $this->circuitModel->create($data);
        $this->sendResponse(200, ['message' => 'Item created successfully']);
    }

    public function updateCircuit($id, $data) {
        echo "hello from controller";
        print_r($data);
        echo "<br>";
        $this->circuitModel->update($id, $data);
        $this->sendResponse(200, ['message' => 'Item updated successfully']);
    }

    public function deleteCircuit($idDelete) {
        $this->circuitModel->delete($idDelete);
        $this->sendResponse(200, ['message' => 'Item deleted successfully']);
    }
}
