<?php
    class categoryModel {
        private $conn;
        
        //inisialisasi awal untuk class biasa disebut instansiasi
        function __construct(){
            // create connection
            $this->conn = new mysqli("localhost", "root", "", "avmsdb");
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

        function insertCat($catname){
			$query = "insert into tblcategory(categoryName) value('$catname')";
			return $this->execute($query);
		}

        public function getCategories() {
            $query = "SELECT * FROM tblcategory ORDER BY categoryName";
            return $this->conn->query($query);
        }

        // Menambahkan departemen baru
        function selectCat(){
            $query = "select *from tblcategory";
            return $this->execute($query);
        }
        
        function deleteCat($catid){
            $query = "delete from tblcategory where id='$catid'";
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