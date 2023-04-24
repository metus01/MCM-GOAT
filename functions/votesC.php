<?php
session_start();
if(isset($_SESSION["position"]))
{
  require "db.connect.php";
  $name = "RONALDO";
  $stmt =  $connexion->query("SELECT * FROM votes WHERE vote LIKE  '%$name%'");
  $result = $stmt->execute();
  if($result == true)
  {
    $votesM = $stmt->rowCount();
    echo $votesM;
  }
  else{
    $votesM = 0;
    echo $votesM;
  }
}else
{
  echo "Une erreur est survenue";
}
?>