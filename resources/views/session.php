<?php
    
	session_start();
	if(isset($_SESSION["sessionname"])==FALSE){
	$_SESSION["sessionname"]="";
	}
	$sessionname=$_SESSION['sessionname'];


		if( $sessionname == ""){
		echo "<script> window.location.href='/login-web';</script>";
		}
	

?>