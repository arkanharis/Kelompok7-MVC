<?php
	//include class model
	//include "../models/visitorModel.php";

    $modelPath = __DIR__ . '/../models/adminModel.php';

	if (file_exists($modelPath)) {
		include $modelPath;
	} else {
		die("Error: File not found at path: $modelPath");
	}

class adminController {
    public $adminModel;

    function __construct() {
        $this->adminModel = new adminModel();
    }

    function validateUser($email, $contactno) {
        $query = "SELECT ID FROM tbladmin WHERE Email='$email' AND MobileNumber='$contactno'";
        return $this->adminModel->execute($query);
    }

    function getAdminName($eid) {
        return $this->adminModel->selectAdm($eid);
    }

    function getAdmin() {
        $adminid=$_SESSION['cvmsaid'];
        $query = "select * from tbladmin where ID='$adminid'";
        return $this->adminModel->execute($query);
    }

    function updateAdmin($password, $email, $contactno) {
        $update = $this->adminModel->updateAdm($password, $email, $contactno);
        if ($update) {
            echo "<script>alert('Password successfully changed');</script>";
            session_destroy();
        } 
    }

    function fetch_array($result) {
        return $this->adminModel->fetch($result);
    }

    function __destruct() {}

    function login(){
        if(isset($_POST['login']))
        {
            $adminuser=$_POST['username'];
            $password=md5($_POST['password']);            
            $ret=$this->adminModel->checkCredentials($adminuser, $password);
            if($ret>0){
            $_SESSION['cvmsaid']=$ret['ID'];
            header('location:views/dashboard.php');
            }
            else{
            $msg="Invalid Details.";
            }
        }
    }

    function editAdm(){
            
        $adminid=$_SESSION['cvmsaid'];
        $AName=$_POST['adminname'];
        $mobno=$_POST['mobilenumber'];
        $email=$_POST['email'];
        
        $query = $this->adminModel->editAdm($AName, $mobno, $email, $adminid);
        
        if ($query) {
            return "Admin profile has been updated.";
        }
        else
        {
        return "Something Went Wrong. Please try again.";
        }        
    }
    
}
?>