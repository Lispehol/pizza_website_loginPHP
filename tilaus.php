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
        <link href="pizza.css" rel="stylesheet" >
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
    </head>
    <body>
    <a href="member-index.php">Takaisin</a> | <a href="member-profile.php">Omat tilaukset</a> | <a href="logout.php">Logout</a>
    <div class="container mt-5" style="padding-bottom:50px;" id="form1">
             <!--pitsatilauslomake-->
        
            
                <form style="margin-left: 50px; margin-top: 20px;" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <h1 class=" text-center">Tee pizzatilaus täyttämällä lomake!</h1><br><br>
                    <label>Tilaajan nimi:</label>
                    <input id="tilaaja" type="text" name="tilaaja" required><br><br>
                    
                    <label>Valitse pizza:</label>
                    <select id="pitsa" name="pitsa">
                    <option value="Opera Special">Opera Special</option>
                    <option value="Tropicana">Tropicana</option>
                    <option value="Fantasia">Fantasia</option>
                    <option value="Hawaii">Hawaii</option>
                    <option value="Special">Special</option>
                    </select>
                    
                    <br><br>
                    <p>Pizzan koko:</p>
                    <div id="koko">
                        <input class="koko" id="lastenpitsa" type="radio" name="koko" value="lasten pizza">
                        <label>lasten pizza</label><br>
                        <input class="koko" id="normaali" type="radio" name="koko" value="normaali">
                        <label>normaali</label><br>
                        <input class="koko" id="perhe" type="radio" name="koko" value="perhepizza">
                        <label>perhepizza</label>
                    </div>
                    <br>

                    <p>Lisätäytteet:</p>

                    <input class="lisaehdot" id="tuplajuusto" type="radio" name="Lisaehdot" value="tuplajuusto">
                    <label>tuplajuusto</label><br>
                    <input class="lisaehdot" id="majoneesi" type="radio" name="Lisaehdot" value="majoneesi">
                    <label>majoneesi</label><br>
                    <input class="lisaehdot" id="vsipuli" type="radio" name="Lisaehdot" value="valkosipuli">
                    <label>valkosipuli</label>
                    <br><br>
                    
                    <p>Lisätietoja tilaukseen:</p>
                    
                    <textarea id="muuta" name="viesti" cols="30" rows="5" placeholder="Kirjoita tähän..."></textarea><br><br>
                    <input type="submit" name="tilaa" value="Tilaa">
                    <input type="reset" value="Tyhjennä"><br>
                    
                </form>
                <div style="font-size:large; margin-left: 50px; color: red;">
                        <?php
                        if (isset($_POST["tilaa"])){
                            $tilaaja = $_POST["tilaaja"];
                            $pitsa = $_POST["pitsa"];
                            $koko = $_POST["koko"];
                            $lisaehdot = $_POST["Lisaehdot"];
                            $viesti = $_POST["viesti"];
                            $aika = date("Y/m/d");
                            $email= $_SESSION['SESS_EMAIL'];

                            $result = mysqli_query($link, "INSERT INTO tilaus (tilaaja, pitsa, koko, lisaehdot, viesti, aika, email) 
                            VALUES('$tilaaja', '$pitsa', '$koko', '$lisaehdot', '$viesti', '$aika', '$email')");
                       

                        if($result) {
                            echo "Tilaus vastaanotettu!";
                    }	else {
                        echo "Fail";
                    }
                    $link->close();
                    
                }
                ?>
                </div> 
            </div>
    </body>
</html>