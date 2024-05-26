<?php
	//Start session
	session_start();
	
	//Include database connection details
	require_once('config.php');
	
	//Array to store validation errors
	//$errmsg_arr = array();
	
	//Validation error flag
	//$errflag = false;
	
	//Connect to mysql server
	$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Failed to connect to server: ' . mysqli_error());
	}
	
	//Select database
	$db = mysqli_select_db($link, DB_DATABASE);
	if(!$db) {
		die("Unable to select database");
	}
   
	if(isset($_POST["newpw"])){
    $login = $_POST['logintunn'];
 
	$result = mysqli_query($conn, "SELECT * FROM members WHERE login = '$login'");
	//$members = mysqli_fetch_all($result, MYSQLI_ASSOC);
		echo $result;

	}
    /*
    if($login == '') {
		$errmsg_arr[] = 'Login ID missing';
		$errflag = true;
	}

    //If there are input validations, redirect back to the registration form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: newpassword.php");
		exit();
	}*/
    //$sql = "SELECT login FROM members where login = '$login'";
    //$result = @mysqli_query($link, $sql);
	
	//Check whether the query was successful or not
	/*if($result) {


    //random functio
    function RandomString()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = '';
        for ($i = 0; $i < 10; $i++) {
            $randstring = $characters[rand(0, strlen($characters))];
        }
        return $randstring;
    }

    RandomString();
    echo $randstring;
    

    //Create query
	$qry = "UPDATE members SET password=".md5($randstring)." WHERE login='$login'";
	$result = @mysqli_query($link, $qry);
	
	//Check whether the query was successful or not
	/*if($result) {
		echo "Password changed successfully!";
	}else {
		die("Query failed");
	}
}
else {
    echo "Fail";*/
/*}
	}
?>


//näytetään selaimella

//emailiin hox md5() functio


//Create UPDATE query