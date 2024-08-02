<?php
session_start();

//Include database connection details
require_once('../php/config.php');

//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;

$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Failed to connect to server: ' . mysqli_error());
	}
	
	//Select database
	$db = mysqli_select_db($link, DB_DATABASE);
	if(!$db) {
		die("Unable to select database");
	}

?>
<html>
  <head>
    <title>New password</title>
    <link href="loginmodule.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <p>&nbsp;</p>
    <form id="newpwform" name="npwForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <table width="320" border="0" align="center" cellpadding="2" cellspacing="0">
        <tr>
          <td width="120"><b>Sähköpostiosoite:</b></td>
          <td width="200"><input name="logintunn" type="text" class="textfield" id="login" /></td>
        </tr>
        
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="newpw" value="Tilaa uusi salasana" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><p><a href="../login.html">Click here</a> to login to your account.</p></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><?php
                if(isset($_POST["newpw"])){
                  $login = $_POST['logintunn'];


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
                  }

                
                  $result = mysqli_query($link, "SELECT * FROM members WHERE email = '$login'");
                  //$members = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    

                  if($result) {

                    $random = uniqid();
                  
                    //Create query
                    $qry = "UPDATE members SET passwd='".md5($random)."' WHERE email='$login'";
                  
                    $result = @mysqli_query($link, $qry);
                    
                    //Check whether the query was successful or not
                    if($result) {
                      echo "Salasana vaihdettu onnistuneesti!";
                      echo "Saat pian sähköpostilla uuden salasanasi.";
                  
                        // the message
                        $msg = "Uusi salasanasi on: " .$random;
                          
                        // use wordwrap() if lines are longer than 70 characters
                        $msg = wordwrap($msg,70);
                        //tulosta viesti
                        echo $msg;
                        // send email
                        mail($login, "newpassword", $msg);

                    } else {
                      echo "Error: " . $sql . "<br>" . $conn->error;
                    }

                  } else {
                    die("Query failed");
                  }
                }
              ?>
          </td>
        </tr>
      </table>
    </form>
  </body>
</html>
