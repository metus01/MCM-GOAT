<?php
function securite($word)
{
  $result  = htmlentities(htmlspecialchars(htmlspecialchars_decode(htmlspecialchars(trim($word)))));
  return $result;
}
if (isset($_POST)) {
  if (isset($_POST["pseudo"]) && isset($_POST["numero"]) && isset($_POST["email"]) && !empty($_POST["pseudo"]) && !empty($_POST["numero"]) && !empty($_POST["email"])) {
    require "db.connect.php";
    $pseudo = securite($_POST["pseudo"]);
    $email = securite($_POST["email"]);
    $numero = securite($_POST["numero"]);
    $unique_id = rand(1, 10000);
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $sql1 = "SELECT * FROM users WHERE numero = '$numero'";
      $stmt1 = $connexion->query($sql1);
      $stmt1->closeCursor();
      if ($stmt1->rowCount() > 0) {
        echo "Le numéro existe deja ";
      } else {
        $sql2 = "SELECT * FROM users WHERE email = '$email'";
        $stmt2  = $connexion->query($sql2);
        $stmt2->closeCursor();
        if ($stmt2->rowCount() > 0) {
          echo " Le mail a été déjà pris utilisé";
        } else {
          $sql = "INSERT INTO users (unique_id , pseudo , numero  email) VALUES ($unique_id , $pseudo , $numero , $email)";
          $stmt = $connexion->prepare($sql);
          $result = $stmt->execute();
          if ($result == true) {
            session_start();
            $_SESSION["position"] = $unique_id;
            echo "success";
          } else {
            echo " Erreur...Veuillez reprendre";
          }
        }
      }
    } else {
      echo " Veuillez remplir tous les champs";
    }
  }
}
