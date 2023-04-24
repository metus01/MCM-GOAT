<?php
if(isset($_POST))
{
  if(isset($_POST["username"]) && isset($_POST["password"]) && !empty($_POST["username"]) && !empty($_POST["password"]))
  {
     require "db.connect.php";
     $username = htmlentities(htmlspecialchars(trim($_POST["username"])));
     $password = htmlentities(htmlspecialchars(trim($_POST["password"])));
     $stmt = $connexion->prepare("SELECT * FROM admin WHERE username = ? AND pass = ?");
     $stmt->execute(array($username , $password));
     $stmt->closeCursor();
     if($stmt->execute() == true)
     {
      if($stmt->rowCount() == 1)
      {
        echo "success";
        session_start();
        $_SESSION["admin"] = $username;
      }else
      {
        echo "Administrateur inconu";
      }
     }else{
          echo "Erreur de connexion , veuillez réessayer svp...";
         }
  }else
  {
    echo " Veuillez remplir tous les champs";
  }
}
?>