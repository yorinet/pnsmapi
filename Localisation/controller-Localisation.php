<?php
require_once 'model-Localisation.php';

class Controller {
    private $localisationModel;

    public function __construct() {
        $this->localisationModel = new Localisation();
    }

    private function sendResponse($statusCode, $data) {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function getLocalisationAll() {
        $dataAll = $this->localisationModel->getAll();
        $this->sendResponse(200, $dataAll);
    }

    public function getLocalisationById($id) {
        $dataById = $this->localisationModel->getById($id);

        if ($dataById) {
            $this->sendResponse(200, $dataById);
        } else {
            $this->sendResponse(404, ['error' => 'Item not found']);
        }
    }

    public function createLocalisation($data) {
        echo "hello from controller";
        print_r($data);
        echo "<br>";
        $this->localisationModel->create($data);
        $this->sendResponse(200, ['message' => 'Item created successfully']);
    }

    public function updateLocalisation($id, $data) {
        echo "hello from controller";
        print_r($data);
        echo "<br>";
        $this->localisationModel->update($id, $data);
        $this->sendResponse(200, ['message' => 'Item updated successfully']);
    }

    public function deleteLocalisation($idDelete) {
        $this->localisationModel->delete($idDelete);
        $this->sendResponse(200, ['message' => 'Item deleted successfully']);
    }
}
