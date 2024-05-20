<?php
class visitorpassModel {
    private $conn;

    public function __construct(){
        $this->conn = new mysqli("localhost", "root", "", "avmsdb");
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getVisitorPassById($pid) {
        $query = "SELECT * FROM tblvisitorpass WHERE id='$pid'";
        return $this->conn->query($query);
    }

    public function deleteVisitorPass($pid) {
        $sql = "DELETE FROM tblvisitorpass WHERE ID='$pid'";
        return $this->conn->query($sql);
    }

    public function getAllVisitorPasses() {
        $query = "SELECT * FROM tblvisitorpass";
        return $this->conn->query($query);
    }

    public function getVisitorsPassBetweenDates($fromDate, $toDate) {
        $query = "SELECT * FROM tblvisitorpass WHERE date(creationDate) BETWEEN '$fromDate' AND '$toDate'";
        return $this->conn->query($query);
    }

    public function createVisitorPass($passnumber, $categoryName, $visitorName, $mobileNumber, $address, $apartment, $floor, $passDetails, $fromDate, $toDate) {
        $query = "INSERT INTO tblvisitorpass(passnumber, categoryName, VisitorName, MobileNumber, Address, Apartment, Floor, passDetails, fromDate, toDate) 
                  VALUES ('$passnumber', '$categoryName', '$visitorName', '$mobileNumber', '$address', '$apartment', '$floor', '$passDetails', '$fromDate', '$toDate')";
        return $this->conn->query($query);
    }
}
?>
