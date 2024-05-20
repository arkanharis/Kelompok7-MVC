<?php
	//include class model
	//include "../models/visitorModel.php";

	$modelPath = __DIR__ . '/../models/visitorModel.php';

	if (file_exists($modelPath)) {
		include $modelPath;
	} else {
		die("Error: File not found at path: $modelPath");
	}

	
	class visitorController{
		//variabel public
		public $visitorModel;
		
		//inisialisasi awal untuk class
		function __construct(){
			$this->visitorModel = new visitorModel(); //variabel model merupakan objek baru yang dibuat dari class model
		}

		function getvisitors($eid){
			return $this->visitorModel->selectVis($eid);
		}

		function getAllvisitors(){
			return $this->visitorModel->selectAll();
		}

		function getSearchVisitors($searchTerm)
        {
            return $this->visitorModel->searchVisitors($searchTerm);
        }

		function getReportDetails()
        {	
			$fdate=$_POST['fromdate'];
			$tdate=$_POST['todate'];		
            return $this->visitorModel->selectVisDateRange($fdate, $tdate);
        }
		
		function delete($vid){
			$delete = $this->visitorModel->deleteVis($vid);
            if ($delete) {
                echo "<script>alert('Visitor pass deleted.');</script>";
            } else {
                echo "<script>alert('Failed to delete visitor.');</script>";
            }
		}

        function updateVisitorRemark($vid, $remark) {
            $update = $this->visitorModel->updateRemark($vid, $remark);
            if ($update) {
                echo "<script>alert('Visitor's remark has been updated.');</script>";
            } else {
                echo "<script>alert('Failed to update remark.');</script>";
            }
        }

		function addVis($fullname, $mobnumber, $email, $add, $whomtomeet, $department, $reasontomeet) {
			$add = $this->visitorModel->addVisitor($fullname, $mobnumber, $email, $add, $whomtomeet, $department, $reasontomeet);
            if ($add) {
				echo "<script>alert('Visitor Details added successfully');</script>"; 
			}
			else{
			   echo "<script>alert('Something Went wrong. Please Try agaian');</script>"; 
			}
        } 

        function viewEdit($vid){
			$data = $this->model->selectVis($vid); //select data mahasiswa dengan nim ...
			$row = $this->model->fetch($data); //fetch hasil select
			include "../visitor-detail.php"; //menampilkan halaman untuk mengedit data
		}
		
		function __destruct(){
		}

		function showAdminDashboard(){
			if (strlen($_SESSION['cvmsaid']==0)) {
				header('location:logout.php');
			} else{				
				return [
				"count_today_visitors" => $this->visitorModel->countTodayVisitors(),
				"count_yesterday_visitors" => $this->visitorModel->countYesterdayVisitors(),
				"count_lastsevendays_visitors" => $this->visitorModel->countLastSevenDaysVisitors(),
				"count_lastthirdaydays_visitors" => $this->visitorModel->countLastthirdaydaysVisitors(),
				"count_total_visitors" => $this->visitorModel->countTotalVisitors(),
				];
			}
		}
	}
?>