<?php
require_once 'model-pages.php';

class Controller {
    private $pagesModel;

    public function __construct() {
        $this->pagesModel = new Pages();
    }

    private function sendResponse($statusCode, $data) {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function getPagesAll() {
        $dataAll = $this->pagesModel->getAll();
        $this->sendResponse(200, $dataAll);
    }

    public function getPagesById($id) {
        $dataById = $this->pagesModel->getById($id);

        if ($dataById) {
            $this->sendResponse(200, $dataById);
        } else {
            $this->sendResponse(404, ['error' => 'Item not found']);
        }
    }

    public function createPages($data) {
        echo "hello from controller";
        print_r($data);
        echo "<br>";
        $this->pagesModel->create($data);
        $this->sendResponse(200, ['message' => 'Item created successfully']);
    }

    public function updatePages($id, $data) {
        echo "hello from controller";
        print_r($data);
        echo "<br>";
        $this->pagesModel->update($id, $data);
        $this->sendResponse(200, ['message' => 'Item updated successfully']);
    }

    public function deletePages($idDelete) {
        $this->pagesModel->delete($idDelete);
        $this->sendResponse(200, ['message' => 'Item deleted successfully']);
    }
}
