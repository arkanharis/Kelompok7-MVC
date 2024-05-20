<?php
require_once '../model/visitorModel.php';

class visitorController {
    private $model;

    public function __construct() {
        $this->model = new visitorModel();
    }

    public function getVisitorsBetweenDates($fromDate, $toDate) {
        return $this->model->getVisitorsBetweenDates($fromDate, $toDate);
    }

    function getVis(){
        return $this->model->selectVis();
    }
    
    function insertVis($catname, $visname, $mobnumber, $add, $whomtomeet, $reasontomeet, $apart, $floor){
        return $this->model->insertVis($catname, $visname, $mobnumber, $add, $whomtomeet, $reasontomeet, $apart, $floor);
    }
    
    function __destruct(){
    }

    public function getCountTodayVisitors() {
        return $this->model->getCountTodayVisitors();
    }

    public function getCountYesterdayVisitors() {
        return $this->model->getCountYesterdayVisitors();
    }

    public function getCountLastSevenDaysVisitors() {
        return $this->model->getCountLastSevenDaysVisitors();
    }

    public function getCountTotalVisitors() {
        return $this->model->getCountTotalVisitors();
    }

    public function getVisitorDetailsById($eid) {
        return $this->model->getVisitorDetailsById($eid);
    }

    public function updateVisitorRemark($eid, $remark) {
        return $this->model->updateVisitorRemark($eid, $remark);
    }

    public function searchVisitors($searchData) {
        return $this->model->searchVisitors($searchData);
    }
}

?>
