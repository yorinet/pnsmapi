<?php
require_once 'model-especes.php';

class Controller {
    private $especesModel;

    public function __construct() {
        $this->especesModel = new Especes();
    }

    private function sendResponse($statusCode, $data) {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function getEspecesAll() {
        $dataAll = $this->especesModel->getAll();
        $this->sendResponse(200, $dataAll);
    }

    public function getEspecesById($id) {
        $dataById = $this->especesModel->getById($id);

        if ($dataById) {
            $this->sendResponse(200, $dataById);
        } else {
            $this->sendResponse(404, ['error' => 'Item not found']);
        }
    }

    public function createEspeces($data) {
        echo "hello from controller";
        print_r($data);
        echo "<br>";
        $this->especesModel->create($data);
        $this->sendResponse(200, ['message' => 'Item created successfully']);
    }

    public function updateEspeces($id, $data) {
        echo "hello from controller";
        print_r($data);
        echo "<br>";
        $this->especesModel->update($id, $data);
        $this->sendResponse(200, ['message' => 'Item updated successfully']);
    }

    public function deleteEspeces($idDelete) {
        $this->especesModel->delete($idDelete);
        $this->sendResponse(200, ['message' => 'Item deleted successfully']);
    }
}
