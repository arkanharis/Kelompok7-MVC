<?php 
    class visitorModel {
        private $conn;
        
        //inisialisasi awal untuk class biasa disebut instansiasi
        function __construct(){
            // create connection
            $this->conn = new mysqli("localhost", "root", "", "cvmsdb");
            // Check connection
            if ($this->conn->connect_error) {
                die("Connection failed: ". $this->conn->connect_error);
            }
            //$connect = mysql_connect("localhost", "root", "");
            //$db = mysql_select_db("cvmsdb");
        }

        function execute($query){
            //return mysql_query($query);
            return $this->conn->query($query);
        }

        function selectAll(){
			$query = "select *from tblvisitor";
			return $this->execute($query);
		}

        function selectVis($vid){
			$query = "select * from tblvisitor where id='$vid'";
			return $this->execute($query);
		}

        function selectVisDateRange($fdate, $tdate){
			$query = "select *from tblvisitor where date(EnterDate) between '$fdate' and '$tdate'";
			return $this->execute($query);
		}

        function updateRemark($vid, $remark) {
            $query = "UPDATE tblvisitor SET remark='$remark' WHERE ID='$vid'";
            return $this->execute($query);
        }    

        function addVisitor($fullname, $mobnumber, $email, $add, $whomtomeet, $department, $reasontomeet) {
            $query = "insert into tblvisitor(FullName,Email,MobileNumber,Address,WhomtoMeet,Deptartment,ReasontoMeet) value('$fullname','$email','$mobnumber','$add','$whomtomeet','$department','$reasontomeet')";
            return $this->execute($query);
        }    

        function deleteVis($vid){
            $query="delete from tblvisitor where id='$vid'";
            return $this->execute($query);
        }
        
        function searchVisitors($searchTerm)
        {
            $query = "SELECT * FROM tblvisitor WHERE FullName LIKE '$searchTerm%' OR MobileNumber LIKE '$searchTerm%'";
            return $this->execute($query);
        }

        function fetch($result){
			//return mysql_fetch_array($var);
			return $result->fetch_assoc();
		}

        //pasangan construct adalah destruct untuk menghapus inisialisasi class pada memori
		function __destruct(){
			$this->conn->close();
		}

        function count ($query){
            $query=mysqli_query($this->conn,$query);            
            return mysqli_num_rows($query);
        }

        function countTodayVisitors(){
            $query="select ID from tblvisitor where date(EnterDate)=CURDATE();";        
            $count_today_visitors=$this->count($query);
            return $count_today_visitors;
        }

        function countYesterdayVisitors(){
            $query="select ID from tblvisitor where date(EnterDate)=CURDATE()-1;";            
            $count_yesterday_visitors=$this->count($query);
            return $count_yesterday_visitors;
        }

        function countLastSevenDaysVisitors(){
            $query="select ID from tblvisitor where date(EnterDate)>=(DATE(NOW()) - INTERVAL 7 DAY);";            
            $count_lastsevendays_visitors=$this->count($query);
            return $count_lastsevendays_visitors;
        }

        function countLastthirdaydaysVisitors(){
            $query="select ID from tblvisitor where date(EnterDate)>=(DATE(NOW()) - INTERVAL 30 DAY);";
            $count_lastthirdaydays_visitors=$this->count($query);
            return $count_lastthirdaydays_visitors;
        }

        function countTotalVisitors(){
            $query="select ID from tblvisitor";            
            return $this->count($query);            
        }

    }
?>