<?php
    
	session_start();
   

	if( $_SESSION['sessionname']==""){
		echo "<script> window.location.href='/login-web';</script>";
	}

?>