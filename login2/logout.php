<?php
	//Start session
	session_start();
	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);
	unset($_SESSION['SESS_EMAIL']);
?>
<html>
	<head>
		<title>Logged Out</title>
		<link href="loginmodule.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<h1>Logout </h1>
		<p align="center">&nbsp;</p>
		<h4 align="center" class="err">You have been logged out.</h4>
		<p align="center">Click here to <a href="../login.html">Login</a></p>
		<p align="center"><a href="../index.html">Main page</p>
	</body>
</html>
