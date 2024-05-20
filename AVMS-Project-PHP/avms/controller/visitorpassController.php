<?php
require_once '../model/visitorpassModel.php';

class visitorpassController {
    private $model;

    public function __construct() {
        $this->model = new visitorpassModel();
    }

    public function getVisitorPassById($vid) {
        return $this->model->getVisitorPassById($vid);
    }

    public function getVisitorsPassBetweenDates($fromDate, $toDate) {
        return $this->model->getVisitorsPassBetweenDates($fromDate, $toDate);
    }

    public function createVisitorPass($category, $visitorName, $mobileNumber, $address, $apartment, $floor, $passDetails, $fromDate, $toDate) {
        $passNumber = mt_rand(10000000, 99999999);
        return $this->model->createVisitorPass($passNumber, $category, $visitorName, $mobileNumber, $address, $apartment, $floor, $passDetails, $fromDate, $toDate);
    }

    public function deleteVisitorPass($pid) {
        return $this->model->deleteVisitorPass($pid);
    }

    public function getAllVisitorPasses() {
        return $this->model->getAllVisitorPasses();
    }
}


?>
