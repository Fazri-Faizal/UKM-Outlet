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

	if(isset($_SESSION["passwords"])==FALSE){
		$_SESSION["passwords"]="";
	}

	if(isset($_SESSION["phone_number"])==FALSE){
		$_SESSION["phone_number"]="";
	}

	$sessionname=$_SESSION['sessionname'];
	$role=$_SESSION['role'];
	$user_email=$_SESSION['user_email'];
	$fullname=$_SESSION['fullname'];
	$password=$_SESSION['passwords'];


		if( $sessionname == ""){
		echo "<script> window.location.href='/login-web';</script>";
		}

?>