<?php
class adminModel {
    private $conn;

    function __construct(){
        // Create connection
        $this->conn = new mysqli("localhost", "root", "", "avmsdb");
        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: ". $this->conn->connect_error);
        }
    }

    private function execute($query) {
        $result = $this->conn->query($query);
        return $result;
    }

    public function getAdmin($adminid) {
        $query = "SELECT * FROM tbladmin WHERE ID='$adminid'";
        return $this->execute($query);
    }

    public function updateAdmin($adminid, $AName, $mobno, $email) {
        $query = "UPDATE tbladmin SET AdminName='$AName', MobileNumber='$mobno', Email='$email' WHERE ID='$adminid'";
        return $this->execute($query);
    }

    public function updateAdminPassword($adminid, $newpassword) {
        $query = "UPDATE tbladmin SET Password='$newpassword' WHERE ID='$adminid'";
        return $this->execute($query);
    }

    public function checkCurrentPassword($adminid, $cpassword) {
        $query = "SELECT ID FROM tbladmin WHERE ID='$adminid' AND Password='$cpassword'";
        return $this->execute($query);
    }

    function selectAdmEmCo($email, $contactno){
        $query = "select ID from tbladmin where  Email='$email' and MobileNumber='$contactno'";
        return $this->execute($query);
    }

    public function adminLogin($username, $password) {
        $password = md5($password); // Assuming password is stored as MD5 hash in the database
        $query = "SELECT ID FROM tbladmin WHERE UserName='$username' AND Password='$password'";
        $result = $this->conn->query($query);
        return $result->fetch_array();
    }

    function updateAdmResetPass($password, $email, $contactno){
        $query = "update tbladmin set Password='$password'  where  Email='$email' && MobileNumber='$contactno'";
        return $this->execute($query);
    }

    public function getAdminNameById($adminid) {
        $query = "SELECT AdminName FROM tbladmin WHERE ID='$adminid'";
        $result = $this->conn->query($query);
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['AdminName'];
        } else {
            return null;
        }
    }
}
?>
