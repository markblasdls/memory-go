

<?php 
	class dbs{
		private $db;
		public function __construct(){
			$this->db=mysqli_connect('localhost','root','','memory-go');
		}
		public function execute_query($sql){
			return mysqli_query($this->db,$sql);// or die (mysqli_error($this->db))
		}
		public function getID(){
			return mysqli_insert_id($this->db);
		}
	
	}
?>
