<?php
	include_once('include/head.php');
	unset($_SESSION['username']);
	unset($_SESSION['realname']);
	unset($_SESSION['lastname']);
	unset($_SESSION['shopping_cart']);
	unset($_SESSION['totalprice']);
	unset($_SESSION['type']);
	unset($_SESSION['role']);
	unset($_SESSION['userid']);
	unset($_SESSION['receivemoney']);
	unset($_SESSION['calresult']);
	session_destroy();
	header("location: index.php");

?>