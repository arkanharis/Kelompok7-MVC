<?php
class visitorModel {
    private $conn;

    public function __construct(){
        $this->conn = new mysqli("localhost", "root", "", "avmsdb");
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    function execute($query)
    {
        //return mysql_query($query);
        return $this->conn->query($query);
    }


    function insertVis($catname, $visname, $mobnumber, $add, $whomtomeet, $reasontomeet, $apart, $floor)
    {
        $query = "insert into tblvisitor(categoryName,VisitorName,MobileNumber,Address,WhomtoMeet,ReasontoMeet,Apartment,Floor) value('$catname','$visname','$mobnumber','$add','$whomtomeet','$reasontomeet','$apart','$floor')";
        return $this->execute($query);
    }

     // Menambahkan departemen baru
     function selectVis()
     {
         $query = "select *from tblvisitor";
         return $this->execute($query);
     }
 
     function fetch($result)
     {
         //return mysql_fetch_array($var);
         return $result->fetch_assoc();
     }

     public function getVisitorDetailsById($eid) {
        $query = "SELECT * FROM tblvisitor WHERE ID='$eid'";
        $result = $this->conn->query($query);
        return $result->fetch_assoc();
    }

    public function updateVisitorRemark($eid, $remark) {
        $query = "UPDATE tblvisitor SET remark='$remark' WHERE ID='$eid'";
        return $this->conn->query($query);
    }
 

    public function getVisitorsBetweenDates($fromDate, $toDate) {
        $query = "SELECT * FROM tblvisitor WHERE date(EnterDate) BETWEEN '$fromDate' AND '$toDate'";
        return $this->conn->query($query);
    }

    public function getCountTodayVisitors() {
        $query = "SELECT ID FROM tblvisitor WHERE DATE(EnterDate) = CURDATE()";
        $result = $this->conn->query($query);
        return mysqli_num_rows($result);
    }

    public function getCountYesterdayVisitors() {
        $query = "SELECT ID FROM tblvisitor WHERE DATE(EnterDate) = CURDATE() - INTERVAL 1 DAY";
        $result = $this->conn->query($query);
        return mysqli_num_rows($result);
    }

    public function getCountLastSevenDaysVisitors() {
        $query = "SELECT ID FROM tblvisitor WHERE DATE(EnterDate) >= (DATE(NOW()) - INTERVAL 7 DAY)";
        $result = $this->conn->query($query);
        return mysqli_num_rows($result);
    }

    public function getCountTotalVisitors() {
        $query = "SELECT ID FROM tblvisitor";
        $result = $this->conn->query($query);
        return mysqli_num_rows($result);
    }

    public function searchVisitors($searchData) {
        $query = "SELECT * FROM tblvisitor WHERE VisitorName LIKE '%$searchData%' OR MobileNumber LIKE '%$searchData%'";
        $result = $this->conn->query($query);
        return $result;
    }

    //pasangan construct adalah destruct untuk menghapus inisialisasi class pada memori
    function __destruct()
    {
        $this->conn->close();
    }
}
?>
