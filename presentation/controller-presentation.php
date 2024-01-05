<?php
require_once 'model-presentation.php';

class Controller {
    private $presentationModel;

    public function __construct() {
        $this->presentationModel = new Presentation();
    }

    private function sendResponse($statusCode, $data) {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function getPresentationAll() {
        $dataAll = $this->presentationModel->getAll();
        $this->sendResponse(200, $dataAll);
    }

    public function getPresentationById($id) {
        $dataById = $this->presentationModel->getById($id);

        if ($dataById) {
            $this->sendResponse(200, $dataById);
        } else {
            $this->sendResponse(404, ['error' => 'Item not found']);
        }
    }

    public function createPresentation($data) {
        echo "hello from controller";
        print_r($data);
        echo "<br>";
        $this->presentationModel->create($data);
        $this->sendResponse(200, ['message' => 'Item created successfully']);
    }

    public function updatePresentation($id, $data) {
        echo "hello from controller";
        print_r($data);
        echo "<br>";
        $this->presentationModel->update($id, $data);
        $this->sendResponse(200, ['message' => 'Item updated successfully']);
    }

    public function deletePresentation($idDelete) {
        $this->presentationModel->delete($idDelete);
        $this->sendResponse(200, ['message' => 'Item deleted successfully']);
    }
}
