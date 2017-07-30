<?php
session_start();

if(isset($_SESSION["login"])){
		session_destroy();	
		header("location: ../../index.php"); 
	 
}else
	echo "<h2> Could not log you out! </h2>"
?>