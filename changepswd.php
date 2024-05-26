
<?php

if(ISSET($_POST['vaihda'])){
$member = $_POST['Login'];
$oldpw = $_POST['vanha'];
$oldpw2 = $_POST['passwd'];
$newpw = $_POST['uusi1'];
$newpw2 = $_POST['uusi2'];

if($newpw == $newpw2 && $oldpw2 == md5($oldpw)){
    $qry="SELECT * FROM members WHERE login='$member' AND passwd='$oldpw'";
    $result=mysqli_query($link, $qry);
    if($result){

            $result = mysqli_query($link, "UPDATE members SET passwd='".md5($newpw)."' WHERE login = '$member'");
            if($result){
                $_SESSION['SESS_PASSWD'] = md5($newpw);
                echo "Salasana vaihdettu onnistuneesti!";
            }
        }
        else {
            die("Query failed");
        }

}
else {
    echo "<script>document.getElementById('errMsg').innerHTML = 'Tarkista salasanat!'; </script>";
}
$link->close();
}
?>