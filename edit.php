<?php
	require_once('auth.php');
    ?>
<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
        <meta charset="utf-8">
    </head>
    <body>
    

<?php
  $conn = mysqli_connect("localhost", "root", "", "login");

//käyttäjätietojen muokkaus
if(isset($_POST['edit'])){
    $member = $_POST['editLogin'];

    $result = mysqli_query($conn, "SELECT * FROM members WHERE login = '$member'");
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
    if($result) {
        echo "ok";
}	else {
    echo "Fail";
}
}
?>
   <table class="table table-bordered">
    <thead>
        <th>Etunimi</th>
        <th>Sukunimi</th>
        <th>Login</th>
        <th>email</th>
        <th>salasana</th>
   <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo $user['firstname']; ?></td>
            <td><?php echo $user['lastname']; ?></td>
            <td><?php echo $user['email']; ?></td>
            <td><?php echo $user['login']; ?></td>
            <td></td>
        <td>
    <?php endforeach; ?>
    <tr>
        <td><input placeholder="Vaihda nimi" type="text"></td>
        <td><input placeholder="Vaihda sukunimi" type="text"></td>
        <td><input placeholder="Vaihda login" type="text"></td>
        <td><input placeholder="Vaihda email" type="text"></td>
        <td><input placeholder="Vaihda salasana" type="text"></td>
    </tr>
    </table>
    <?php
    $conn->close();
    ?>
    </body>
</html>