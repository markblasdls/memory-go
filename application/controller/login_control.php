
<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();

class login_control{
	public function __construct(){}
	public function login(){
		include $_SERVER['DOCUMENT_ROOT'].'/memory-go/application/model/login.php';
		$accountLogin = new login();
		if($accountLogin->isLogin()){
			return true;
		}
		else 
			return false;


	}

}
$account = new login_control();
if (isset($_POST['login'])) {
	if($account->login()){
		 header("location:../../index.php");
	}
	else
		header("location:../../application/view/login_view.php?action=incorrect");
}




