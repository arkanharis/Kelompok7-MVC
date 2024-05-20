<?php
	//include class model
	include "../model/categoryModel.php";
	
	class categoryController{
		//variabel public
		public $category;
		
		//inisialisasi awal untuk class
		function __construct(){
			$this->category = new categoryModel(); //variabel model merupakan objek baru yang dibuat dari class model
		}

		function getCatorder(){
			return $this->category->selectCat();
		}

        public function getCategories() {
            return $this->category->getCategories();
        }
        
		function insertCat($catname){
			return $this->category->insertCat($catname);
		}

        function deleteCat($catid){
			return $this->category->deleteCat($catid);
		}
		
		function __destruct(){
		}
	}
?>