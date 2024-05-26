<?php

    if(ISSET($_POST['tallenna'])){
    $member = $_POST['Login'];
    $newFname = $_POST['editfname'];
    $newLname = $_POST['editlname'];
    $newemail = $_POST['editemail'];

    $result = mysqli_query($link,"UPDATE members SET firstname = '$newFname', lastname = '$newLname', email = '$newemail' WHERE login = '$member'");

    if($result) {
        echo "Käyttäjätiedot muokattu onnistuneesti.";
        echo "Käyttäjätiedot päivittyvät sivulle, kun kirjaudut uudelleen.";
    $_SESSION['SESS_EMAIL'] = $newemail;
        $result = mysqli_query($link,"SELECT * FROM members WHERE login = '$member'");
        
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                
                echo "<br> nimi: ". $row["firstname"]. "," .$row["lastname"]. "- email: ". $row["email"];
            
            
            }
            } else {
                echo "0 results";
            }
        
        
    }	else {
    echo "Fail";
    }

    $link->close();

    }
    ?>