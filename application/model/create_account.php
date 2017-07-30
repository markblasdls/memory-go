<?php
date_default_timezone_set('Asia/Manila');
include 'dbs.php';


class create_account{

	private $db;
	
	public $firstname;
	public $lastname;
	public $gender;
	public $birthday;
	public $address;
	public $contact_number;
	
	public $email;
	public $username;
	public $password;

	public $account_type;
	public $date_created;



	public function __construct(){
		$this->db = new dbs();
	}
	public function save(){
		$this->account_type = "user";
		$this->date_created = date("l, F j Y @h:i A",time());
		$sql = "INSERT INTO accounts(firstname,lastname,gender,birthday,address,contact_number,email,username,password,account_type,date_created) 
				VALUES('$this->firstname','$this->lastname','$this->gender','$this->birthday','$this->address','$this->contact_number','$this->email','$this->username','$this->password','$this->account_type','$this->date_created')";
		$result=$this->db->execute_query($sql);
		if ($result) {
			
			return true;
		}
		else return true;
	}

	public function checkAccount(){

		 $sql = "SELECT * FROM accounts WHERE username='$this->username' LIMIT 1"; // query the person
		 $result = $this->db->execute_query($sql);
		 $isExistCount = mysqli_num_rows($result);
		 if ($isExistCount == 1) {
	            return true;
		 }
		 else
		 	return false;

	}
	
}

