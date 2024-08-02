<?php
    require_once('../../login2/auth.php');

    //Include database connection details
    require_once('../../php/config.php');
        

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
        <title>Member Index</title>
        <link href="../../css/pizza.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
        <link href='https://fonts.googleapis.com/css?family=Rock Salt' rel='stylesheet'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    </head>
    <body>
                <div class="container-fluid " style="background-color: #fad250;" >
                    <div class="container" style="padding-top:50px;">
                        <span><h1 id="h1">Welcome </h1></span><span><h2><?php echo $_SESSION['SESS_FIRST_NAME'];?></h2></span><br>
                        <a href="tilaus.php">Tee tilaus</a> | <a href="member-profile.php">Omat tilaukset</a> | <a href="../logout.php">Logout</a><br><br>
                        <p>This is a password protected area only accessible to members. </p>
                    </div>
                    <div class="container mt-4">
                    <h2>Käyttäjätiedot</h2>
                    <br>
                    <form action='edituserdata.php?login="<?php echo $_SESSION['SESS_LOGIN']; ?>"' method="post">
                        <table class="table">
                            <tr>
                                <td>Etunimi:</td>
                                <td><span id="fname"><?php echo $_SESSION['SESS_FIRST_NAME'];?></span><input style="display:none" id="editFname" name="editfname" value="<?php echo $_SESSION['SESS_FIRST_NAME']; ?>"></td>
                            </tr>
                            <tr>
                                <td>Sukunimi:</td>
                                <td><span id="lname"><?php echo $_SESSION['SESS_LAST_NAME'];?></span><input style="display:none" id="editLname" name="editlname" value="<?php echo $_SESSION['SESS_LAST_NAME']; ?>"></td>
                            </tr>
                            <tr>
                                <td>Sähköposti:</td>
                                <td><span id="email"><?php echo $_SESSION['SESS_EMAIL'];?></span><input style="display:none" id="editEmail" name="editemail" value="<?php echo $_SESSION['SESS_EMAIL']; ?>"></td>
                            </tr>
                        </table>
                        
                        <!--muokkaa käyttäjätietoja-->
                        <input class="button" type="button" id="edit" value="Muokkaa käyttäjätietoja">
                        <input class="button" type="submit" value="Tallenna" id="tallenna" name="tallenna" style="display:none">
                        <input class="button" type="button" id="takaisin" style="display:none" value="Takaisin">
                        <input type="hidden" name="Login" value="<?php echo $_SESSION['SESS_LOGIN']; ?>">
                    </form>
                    </div>
                    <!--change password-->
                    <div class="container mt-4" style="padding-bottom:100px;">
                        <h3>Vaihda salasana</h3>
                        <form style="margin-bottom: 50px;" class="mb-4" id="pswform" action='member-index.php?login="<?php echo $_SESSION['SESS_LOGIN'];?>"' method="post">
                            <table class="table">
                                <tr>
                                    <td>Vanha salasana</td>
                                    <td><input type="password" name="vanha" required id="input1"></td>
                                    <td><input type="checkbox" onclick="togglePw()">Näytä salasana</td>
                                </tr>
                                <tr>
                                    <td>Uusi salasana</td>
                                    <td><input type="password" id="uusi1" name="uusi1" required></td>
                                    
                                </tr>
                                <tr>
                                    <td>Vahvista uusi salasana</td>
                                    <td><input type="password" id="uusi2" name="uusi2" required></td>
                                    
                                </tr>
                            </table>
                            <input class="button" type="submit" id="newpw" name="vaihda" value="Vaihda salasana"><input class="button" type="reset" value="Tyhjennä"><span id="errMsg">  </span>
                            <input type="hidden" name="Login" value="<?php echo $_SESSION['SESS_LOGIN']; ?>">
                            <input type="hidden" name="passwd" value="<?php echo $_SESSION['SESS_PASSWD']; ?>">
                        </form>
                    </div>
                    
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
                </div>
        <script>
            $(document).ready(function(){
                    //näytä tunnukset muokkaustilassa
                $("#edit").click(function(){
                    $("#fname, #lname, #email").hide();
                });
                $("#edit").click(function(){
                    $("#editLname, #editFname, #editEmail, #editPswd, #tallenna, #takaisin").show();
                });
                    //tallenna painiketta painaessa palautuu normitilaan
                $("#tallenna").click(function(){
                    $("#editLname, #editFname, #editEmail, #editPswd, #tallenna, #takaisin").hide();
                    
                });
                $("#tallenna").click(function(){
                    $("#fname, #lname, #email").show();
                });
                //takaisin painiketta painaessa palautuu normitilaan
                $("#takaisin").click(function(){
                    $("#editLname, #editFname, #editEmail, #editPswd, #tallenna, #takaisin").hide();
                    
                });
                $("#takaisin").click(function(){
                    $("#fname, #lname, #email").show();
                });
            });

            function togglePw() {
                var x = document.getElementById("input1");
                
                if (x.type === "password") {
                        x.type = "text";
                    } else {
                        x.type = "password";
                }
            }
        </script>
    </body>
</html>
