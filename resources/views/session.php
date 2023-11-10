<?php
    
	session_start();
	if(isset($_SESSION["sessionname"])==FALSE){
	$_SESSION["sessionname"]="";
	}

	if(isset($_SESSION["role"])==FALSE){
	$_SESSION["role"]="";
	}

	if(isset($_SESSION["user_email"])==FALSE){
	$_SESSION["user_email"]="";
	}

	if(isset($_SESSION["fullname"])==FALSE){
		$_SESSION["fullname"]="";
		}

	$sessionname=$_SESSION['sessionname'];
	$role=$_SESSION['role'];
	$user_email=$_SESSION['user_email'];
	$fullname=$_SESSION['fullname'];


		if( $sessionname == ""){
		echo "<script> window.location.href='/login-web';</script>";
		}

?>