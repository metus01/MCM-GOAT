<?php
session_start();
if(isset($_SESSION["position"]))
{
  require "db.connect.php";
  $name = "MESSI";
  $stmt =  $connexion->prepare("SELECT * FROM votes WHERE vote LIKE  '%$name%'");
  $stmt->execute();
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
  echo "Une Erreur est survenue";
}
?>