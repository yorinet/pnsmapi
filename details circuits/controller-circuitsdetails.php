<?php
require_once 'model-circuitsdetails.php';

class ControllerDetails {
    private $circuitdetailsModel;

    public function __construct() {
        $this->circuitdetailsModel = new CircuitDetails();
    }

    private function sendResponse($statusCode, $data) {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function getCircuitDetailsAll() {
        $dataAll = $this->circuitdetailsModel->getAll();
        $this->sendResponse(200, $dataAll);
    }

    public function getCircuitDetailsById($id) {
        $dataById = $this->circuitdetailsModel->getById($id);

        if ($dataById) {
            $this->sendResponse(200, $dataById);
        } else {
            $this->sendResponse(404, ['error' => 'Item not found']);
        }
    }

    public function createCircuitDetails($data) {
        echo "hello from controller";
        print_r($data);
        echo "<br>";
        $this->circuitdetailsModel->create($data);
        $this->sendResponse(201, ['message' => 'Item created successfully']);
    }

    public function updateCircuitDetails($id, $data) {
        echo "hello from controller";
        print_r($data);
        echo "<br>";
        $this->circuitdetailsModel->update($id, $data);
        $this->sendResponse(200, ['message' => 'Item updated successfully']);
    }

    public function deleteCircuitDetails($idDelete) {
        $this->circuitdetailsModel->delete($idDelete);
        $this->sendResponse(200, ['message' => 'Item deleted successfully']);
    }
}
