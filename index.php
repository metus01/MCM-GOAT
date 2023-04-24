<?php
define("URL", str_replace("index.php","",(isset($_SERVER['HTTPS']) ? "https" : "http").
"://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));
try
{
  if(empty($_GET['page'])){
    require "acceuil.php";
} else {
    $url = explode("/", filter_var($_GET['page']),FILTER_SANITIZE_URL);
    switch($url[0]){
        case "tendance" : 
        require "tendance.php";
        break;
        case "inscription" : 
          require "acceuil.php";
          break;
          case "votes":
            require "goat.php";
            break;
        default:   throw new Exception("La page n'existe pas");
        
      }
  }
}
catch(Exception $msg){
  echo $msg->getMessage();
  require "erreur.php";
}
?>