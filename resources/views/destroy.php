<?php
session_start();
session_unset();
echo "<script> window.location.href='/login-web';</script>";
session_destroy();
//DESTROY SESSION 
?>