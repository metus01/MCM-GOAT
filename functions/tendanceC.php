<?php
session_start();
if(isset($_SESSION["position"]))
{
  if(isset($_POST["vote"]) && !empty($_POST["vote"]))
  {
    require "db.connect.php";
    $voteman_id = $_SESSION["position"];
    $vote = htmlentities(htmlspecialchars(trim($_POST["vote"])));
    $stmt1 = $connexion->query("SELECT * FROM votes WHERE voteman_id = '$voteman_id'");
    $stmt1->closeCursor();
    if($stmt1->rowCount() > 0)
    {
      $signal =" Vous ne pouvez pas voter plus d'une fois";
      echo $signal;
    }else
    {
      $stmt = $connexion->prepare("INSERT INTO votes(voteman_id , vote) VALUES (?,?)");
      $stmt->execute(array($voteman_id , $vote));
      $stmt->closeCursor();
      $result = $stmt->execute();
      if($result == true)
      {
        $signal = "success";
        echo $signal;
      }else
      {
        $signal = "L'envoie a échoué , veuillez réessayer";
        echo $signal;
      }
    
    }

    
  }
}
?>