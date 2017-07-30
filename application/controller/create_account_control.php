<?php

class create_account_control{

	public function __construct(){}

	public function creataccount(){
		include $_SERVER['DOCUMENT_ROOT'].'/memory-go/application/model/create_account.php';

		$create_account = new create_account();
		$create_account->firstname = $_POST['firstname'];
		$create_account->lastname = $_POST['lastname'];
		$create_account->address = $_POST['address'];
		$create_account->contact_number = $_POST['contact_number'];
		$create_account->birthday = $_POST['birthday'];
		$create_account->gender = $_POST['gender'];
		
		$create_account->email = $_POST['email'];
		$create_account->username = $_POST['username'];
		$create_account->password = $_POST['password'];

		if($create_account->checkAccount()){
			header("location:../view/warning_view.php?action=hasaccount");

		}else{

			if($create_account->save()){
			header("location:../view/login_view.php?action=signedin");
			}
			else echo "not saved";
			}

		
	}
}


$account = new create_account_control();
if(isset($_POST['creataccount'])){
	$account->creataccount();
}
else echo "no signup";