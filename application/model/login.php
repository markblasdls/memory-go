<?php
include 'dbs.php';
// Script Error Reporting
error_reporting(E_ALL);
ini_set('display_errors', '1');


class login{
	public $username;
	public $password;
	public $account_type;
	public $db;

	public function __construct(){
		$this->db=new dbs();
	}

	public function isLogin(){
		if (isset($_POST['login'])) {
			$this->username = $_POST['username']; 
			$this->password = $_POST['password'];
			if($this->isAccountExist()){ 
				$this->account_type = $this->getAccountType();
				$this->setAccess();
				return true;
			}
			else
				return false;
		}
	}

	public function getAccountType(){
		//find if admin or not
		$sql = "SELECT account_type FROM accounts WHERE username='$this->username' AND password='$this->password ' LIMIT 1"; // query the person
		$result = $this->db->execute_query($sql);
		$isExistCount = mysqli_num_rows($result);
		if ($isExistCount == 1) { // evaluate the count
		     while($row = mysqli_fetch_array($result)){ 
				 $type = $row["account_type"];
		 }
		 switch ($type) {
		 	case 'admin':
		 		return 'admin';
		 		break;
		 	case 'user':
		 		return 'user';
		 		break;
		 	default:
		 		return 'guest';
		 		break;
			 }
		}
	}
	
	
	public function isAccountExist(){
		// ------- MAKE SURE PERSON EXISTS IN DATABASE ---------
		 $sql = "SELECT * FROM accounts WHERE username='$this->username' AND password='$this->password' LIMIT 1"; // query the person
		 $result = $this->db->execute_query($sql);
		 $isExistCount = mysqli_num_rows($result);
		 if ($isExistCount == 1) {
	            return true;
		 }
		 else
		 	return false;

	}
	
	public function setAccess(){

		//set sessions to allow access
		 $_SESSION["username"] = $this->username;
		 $_SESSION['account_type'] = $this->account_type;
		 $_SESSION['login'] = true;
		 $sql = "SELECT * FROM accounts WHERE username='$this->username' AND password='$this->password ' LIMIT 1"; // query the person
		 $result = $this->db->execute_query($sql);
		 $isExistCount = mysqli_num_rows($result);
			if ($isExistCount == 1) { // evaluate the count
			     while($row = mysqli_fetch_array($result)){ 
					$_SESSION["firstname"] = $row['firstname'];
					$_SESSION["lastname"] = $row['lastname'];
					$_SESSION["gender"] = $row['gender'];
					$_SESSION["birthday"] = $row['birthday'];  
					$_SESSION["address"] = $row['address'];  
					$_SESSION["email"] = $row['email']; 
					$_SESSION['account_id'] = $row['id']; 
					$_SESSION['contact_number'] = $row['contact_number']; 
					
			 }
		}

	}

}