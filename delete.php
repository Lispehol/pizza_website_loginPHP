<?php
	require_once('auth.php');

      //Include database connection details
	require_once('config.php');
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
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <meta charset="utf-8">
    </head>
    <body>
    <a href="admin-edit.php">Takaisin</a> | <a href="admin-index.php">Home</a> | <a href="logout.php">Logout</a>
    <br>
    <div style="margin:20px;">
    <?php  
        

        //käyttäjätietojen poisto
        if(isset($_POST['delete'])){
            $member = $_POST['deleteLogin'];

            $sql = "DELETE from members WHERE login = '$member'";
            $result = $link->query($sql);

            if($result) {
                echo "Käyttäjä poistettu";
        }	else {
            echo "Fail";
        }
            
        }
        if(ISSET($_POST['edit'])){
            $member = $_POST['Login'];
            $newFname = $_POST['editfname'];
            $newLname = $_POST['editlname'];
            $newemail = $_POST['editemail'];

            $sql = "UPDATE members SET firstname = '$newFname', lastname = '$newLname', email = '$newemail' WHERE login = '$member'";
            $result = $link->query($sql);

            if($result) {
                echo "Käyttäjätiedot muokattu onnistuneesti.";
        }	else {
            echo "Fail";
        }

        }

            $link->close();
            ?>
    </div>
    </body>
</html>