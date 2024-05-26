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
    <meta charset="utf-8">
    <title>My Profile</title>
    <link href="loginmodule.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
</head>
<body>
    <div class="container">
        <h1>Muokkaa käyttäjätietoja</h1>
        <a href="admin-index.php">Takaisin</a> | <a href="logout.php">Logout</a>
        <?php 
        
        $result = mysqli_query($link, "SELECT * FROM members ORDER BY lastname ASC");
        $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

        ?>
        <table class="table table-bordered">
            <thead>
                <th>Etunimi</th>
                <th>Sukunimi</th>
                <th>email</th>
                <th>login</th>
                <th>Edit</th>
                <th>Delete</th>
            </thead>
            <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                <form action='delete.php?login="<?php echo $user['login']; ?>"' method="post">
                    <td><input type="text" name="editfname" value="<?php echo $user['firstname']; ?>"></td>
                    <td><input type="text" name="editlname" value="<?php echo $user['lastname']; ?>"></td>
                    <td><input type="text" name="editemail" value="<?php echo $user['email'];?>"></td>
                    <td><?php echo $user['login']; ?></td>
                    <td><input type="submit" name="edit" value="Muokkaa">
                    <input type="hidden" name="Login" value="<?php echo $user['login']; ?>"></td>
                    <td><input type="submit" name="delete" value="Poista">
                    <input type="hidden" name="deleteLogin" value="<?php echo $user['login']; ?>"></td>
                </form>
        
                </tr>
                <?php endforeach; 
                
                $link->close();?>
            </tbody>
        </table>
    </div>




</body>
</html>