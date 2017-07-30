<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();

class flashdrive_control{
	public function __construct(){}

	public function addFlashDrive(){
		include $_SERVER['DOCUMENT_ROOT'].'/memory-go/application/model/flashdrive.php';

		$flashdrive = new flashdrive();
		if($flashdrive->uploadImage()){
			$flashdrive->brand = $_POST['brand'];
			$flashdrive->model = $_POST['model'];
			$flashdrive->capacity = $_POST['capacity'];
			$flashdrive->price = $_POST['price'];
			$flashdrive->stock = $_POST['stock'];
			$flashdrive->details = $_POST['details'];
		 	if($flashdrive->addFlashdrive()){
		 		//echo "saved";
		 		return true;
			}
		
	 		}else return false; //echo "not save"; 
	}
	public function removeFlashDrive($pid){
		include $_SERVER['DOCUMENT_ROOT'].'/memory-go/application/model/flashdrive.php';
		$flashdrive = new flashdrive();
		if($flashdrive->removeFlashdrive($pid)){
			return header("location:../view/manage_view.php?cmd=viewflashdrive");
		}else echo "failed to delete";
	}
	public function editFlashDrive($pid){
		include $_SERVER['DOCUMENT_ROOT'].'/memory-go/application/model/flashdrive.php';
		$flashdrive = new flashdrive();
		if($flashdrive->uploadImage()){
			$flashdrive->brand = $_POST['brand'];
			$flashdrive->model = $_POST['model'];
			$flashdrive->capacity = $_POST['capacity'];
			$flashdrive->price = $_POST['price'];
			$flashdrive->stock = $_POST['stock'];
			$flashdrive->details = $_POST['details'];
			if($flashdrive->EditFlashdrive($pid)){
				return true;
			}
		 //return header("location:../view/manage_view.php?cmd=viewflashdrive");
		}else return false; //echo "failed to edit";
	}
}

$flash = new flashdrive_control();
if(isset($_POST['addflashdrive'])){
	if($flash->addFlashDrive()){
		header("location:../view/manage_view.php?cmd=viewflashdrive");
	}else header("location:../view/manage_view.php?cmd=viewflashdrive");
}

if(isset($_GET['cmd'])){
	if($_GET['cmd']==='remove'){
	$pid = $_GET['id'];
	$flash->removeFlashDrive($pid);
	}
	
}

if(isset($_POST['editflashdrive'])){
	$pid = $_POST['pid'];
	if($flash->editFlashDrive($pid)){
		header("location:../view/manage_view.php?cmd=viewflashdrive");
	}else  header("location:../view/manage_view.php?cmd=viewflashdrive");
}
?>