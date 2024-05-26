<?php
	session_start();
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <link rel="stylesheet" href="pizza.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    </head>
    <body>
        <nav id="nav01"></nav>
        <div  id="main">
        
        <!--koodia-->
        <?php
            if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
                echo '<ul class="err">';
                foreach($_SESSION['ERRMSG_ARR'] as $msg) {
                    echo '<li>',$msg,'</li>'; 
                }
                echo '</ul>';
                unset($_SESSION['ERRMSG_ARR']);
            }
        ?>
        <div class="content text-center">
        <h1 class="text-center">Rekisteröinti</h1><br>
        <p>Rekisteröitymällä jäseneksi voit sisäänkirjautuneena hallinnoida tilauksiasi.</p>
            <form id="loginForm" name="loginForm" method="post" action="register-exec.php">
            <table width="300" border="0" align="center" cellpadding="2" cellspacing="0">
                <tr>
                <th>First Name </th>
                <td><input name="fname" type="text" class="textfield" id="fname" /></td>
                </tr>
                <tr>
                <th>Last Name </th>
                <td><input name="lname" type="text" class="textfield" id="lname" /></td>
                </tr>
                <tr>
                <th>Email </th>
                <td><input name="email" type="text" class="textfield" id="email" /></td>
                </tr>
                <tr>
                <th width="124">Login</th>
                <td width="168"><input name="login" type="text" class="textfield" id="login" /></td>
                </tr>
                <tr>
                <th>Password</th>
                <td><input name="password" type="password" class="textfield" id="password" /></td>
                </tr>
                <tr>
                <th>Confirm Password </th>
                <td><input name="cpassword" type="password" class="textfield" id="cpassword" /></td>
                </tr>
                <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="Submit" value="Register" /></td>
                </tr>
            </table>
            </form>
            </div>
        <div></div>
        </div>
        <footer id="foot01"></footer>
        <script src="script.js"></script>
    </body>
</html>