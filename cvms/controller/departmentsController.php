<?php
	//include class model
	include "../models/departmentsModel.php";
	
	class departmentsController{
		//variabel public
		public $departmentsModel;
		
		//inisialisasi awal untuk class
		function __construct(){
			$this->departmentsModel = new departmentsModel(); //variabel model merupakan objek baru yang dibuat dari class model
		}

		function getDeptorder(){
			return $this->departmentsModel->selectDept();
		}

		// Menambahkan departemen baru
		function addDepartment($deptname){
			return $this->departmentsModel->addDepartment($deptname);
		}
	
		// Menghapus departemen berdasarkan id
		function deleteDepartment($catid){
			return $this->departmentsModel->deleteDepartment($catid);
		}
		
		function __destruct(){
		}
	}
?>