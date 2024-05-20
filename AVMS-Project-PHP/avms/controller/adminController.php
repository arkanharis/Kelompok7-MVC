<?php
include_once(__DIR__ . '/../model/adminModel.php');

class adminController {
    private $adminModel; // perbaiki variabel $model menjadi $adminModel

    function __construct() {
        $this->adminModel = new adminModel();
    }

    public function getAdminDetails($adminid) {
        return $this->adminModel->getAdmin($adminid); // perbaiki pemanggilan $this->model menjadi $this->adminModel
    }

    public function updateAdminDetails($adminid, $AName, $mobno, $email) {
        return $this->adminModel->updateAdmin($adminid, $AName, $mobno, $email); // perbaiki pemanggilan $this->model menjadi $this->adminModel
    }

    public function updateAdminPassword($adminid, $newpassword) {
        return $this->adminModel->updateAdminPassword($adminid, $newpassword);
    }

    public function checkCurrentPassword($adminid, $cpassword) {
        return $this->adminModel->checkCurrentPassword($adminid, $cpassword);
    }

    function getAdmEmCo($email, $contactno){
        return $this->adminModel->selectAdmEmCo($email, $contactno);
    }

    public function adminLogin($username, $password) {
        return $this->adminModel->adminLogin($username, $password);
    }

    function updateAdminResetPass($password, $email, $contactno){
        return $this->adminModel->updateAdmResetPass($password, $email, $contactno);
    }

    public function getAdminName($adminid) {
        return $this->adminModel->getAdminNameById($adminid);
    }
}
?>
