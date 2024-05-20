<?php
class adminModel {
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

	function selectAdm($adminid){
		$query = "select AdminName from tbladmin where ID='$adminid'";
		return $this->execute($query);
	}

	function updateAdm($password, $email, $contactno) {
		$query = "update tbladmin set Password='$password'  where  Email='$email' && MobileNumber='$contactno' ";
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

	function checkCredentials($adminuser, $password){
		$query="select ID from tbladmin where UserName='$adminuser' && Password='$password' ";
    	$ret=$this->fetch($this->execute($query));
		return $ret;
	}

	function editAdm($AName, $mobno, $email, $adminid) {		
		$query="update tbladmin set AdminName='$AName', MobileNumber ='$mobno', Email= '$email' where ID='$adminid'";
		return $this->execute($query);
	}
}

?>