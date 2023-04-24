<?php
session_start();
if(isset($_SESSION["admin"]))
{
  $admin_name = $_SESSION["admin"];
  require "functions/db.connect.php";
  $stmt = $connexion->prepare("SELECT * FROM users ");
  $stmt->execute();
  $ligne = $stmt->rowCount();
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="public/logo3.png" type="image/x-icon">
  <link rel="stylesheet" href="./bi/bootstrap-icons.css">
  <title>Admin</title>
  <link rel="stylesheet" href="css/all.css">
  <link rel="stylesheet" href="css/style4.css">
  
</head>
<body>
  <div class="container">
  <h3 class="username">Hello ,  Admin <?=$admin_name?></h3>
    <h3>Il y a actuellement <?=$ligne?> inscrits</h3>
    <button class="logout"><a href="functions/logout.php" style="text-decoration: none;">Déconnexion</a></button>
  </div>
  <table class="table"></table>
  <script src="js/jquery.min.js"></script>
  <script src="js/admin2.js"></script>
</body>
</html>
<?php
}
else
{
  header("Location:admin1.php");
}
?>