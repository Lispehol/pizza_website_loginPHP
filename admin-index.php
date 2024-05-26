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
        <link rel="stylesheet" href="pizza.css">
        <title>Admin Profile</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
        <link href='https://fonts.googleapis.com/css?family=Rock Salt' rel='stylesheet'>
        <style>
             #h1 {
                font-family: Rock Salt;
                font-size: 40px;
                text-decoration: none;
                color: #99CC00;
                float: left;
                margin-right: 10px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <span><h1 id="h1">Welcome </h1></span><span><h2><?php echo $_SESSION['SESS_FIRST_NAME'];?></h2></span><br>
            <a href="logout.php">Logout</a> | <a href="admin-edit.php">Muokkaa käyttäjätietoja</a>
            <p>Tämä on admin sivu! Täällä voit hallinnoida asiakkaiden tekemiä pitsatilauksia! </p>
            <br><h2>Käyttäjätiedot</h2>
            <br>
            Etunimi: <?php echo $_SESSION['SESS_FIRST_NAME'];?><br>
            Sukunimi: <?php echo $_SESSION['SESS_LAST_NAME'];?><br>
            Sähköposti: <?php echo $_SESSION['SESS_EMAIL'];?><br><br>
            <br><hr>
            <div class="row">
                <div class="col-md-6">
                <h2>Pitsatilaukset</h2>
            <?php
                $sql = "SELECT id, pitsa FROM tilaus";
           
               $result = $link->query($sql);

                if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    
                    echo "<br> id: ". $row["id"]. " - Nimi: ". $row["pitsa"];
                
                }
                } else {
                    echo "0 results";
                }
               
            ?>
            <br><br>
                </div>
                <div class="col-md-6">
                <h2>Poista tilaus</h2>
            <p>Poista listalla oleva tilaus syöttämällä tilauksen ID.</p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                ID: <input type="text" name="id">
                <input type="submit" value="poista" name="poista">
            </form>
            <?php
            if(isset($_POST['poista'])){
                $id = $_POST['id'];
                
                $sql = "DELETE from tilaus WHERE id = '$id'";
                $result = $link->query($sql);

                if($result) {

                    echo "Tilaus poistettu";
            }	else {
                echo "Fail";
            }
            
            }
            $link->close();?>
                </div>

            </div>
            
            
        </div>
        
    </body>
</html>