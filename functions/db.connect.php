<?php
$host = "localhost";
$dbname = "goat";
$username = "root";
$password = "";
$connexion = new PDO("mysql:host=$host;dbname=$dbname" , $username , $password);
try
{
$connexion->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
}
 catch(PDOException $msg)
 {
   echo "Erreur:".$msg;
 }
