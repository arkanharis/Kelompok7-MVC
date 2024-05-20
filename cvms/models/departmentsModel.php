<?php
    class departmentsModel {
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

        function selectDept(){
			$query = "select * from tbldepartments order by departmentName";
			return $this->execute($query);
		}

        // Menambahkan departemen baru
        function addDepartment($deptname){
            $query = "INSERT INTO tbldepartments(departmentName) VALUES ('$deptname')";
            return $this->execute($query);
        }

        // Menghapus departemen berdasarkan id
        function deleteDepartment($catid){
            $query = "DELETE FROM tbldepartments WHERE id='$catid'";
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
    }
?>