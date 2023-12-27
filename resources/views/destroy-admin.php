<?php
session_start();
session_unset();
echo "<script> window.location.href='/admin_login';</script>";
session_destroy();
//DESTROY SESSION 
?>