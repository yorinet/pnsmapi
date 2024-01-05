<?php
require_once 'model-especesdetails.php';

class ControllerDetails {
    private $especesdetailsModel;

    public function __construct() {
        $this->especesdetailsModel = new EspecesDetails();
    }

    private function sendResponse($statusCode, $data) {
        http_response_code($statusCode);
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function getEspecesDetailsAll() {
        $dataAll = $this->especesdetailsModel->getAll();
        $this->sendResponse(200, $dataAll);
    }
    public function getEspecesDetailsMerge() {
        $dataMerge = $this->especesdetailsModel->GetMerge();
        $this->sendResponse(200, $dataMerge);
    }

    public function getEspecesDetailsById($id) {
        $dataById = $this->especesdetailsModel->getById($id);

        if ($dataById) {
            $this->sendResponse(200, $dataById);
        } else {
            $this->sendResponse(404, ['error' => 'Item not found']);
        }
    }

    public function createEspecesDetails($data) {
        echo "hello from controller";
        print_r($data);
        echo "<br>";
        $this->especesdetailsModel->create($data);
        $this->sendResponse(201, ['message' => 'Item created successfully']);
    }

    public function updateEspecesDetails($id, $data) {
        echo "hello from controller";
        print_r($data);
        echo "<br>";
        $this->especesdetailsModel->update($id, $data);
        $this->sendResponse(200, ['message' => 'Item updated successfully']);
    }

    public function deleteEspecesDetails($idDelete) {
        $this->especesdetailsModel->delete($idDelete);
        $this->sendResponse(200, ['message' => 'Item deleted successfully']);
    }
}
