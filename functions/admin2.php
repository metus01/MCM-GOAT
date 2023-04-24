<?php
session_start();
$output="";
$output1= "";
$output2="";
$output3="";
if(isset($_SESSION["admin"]))
{
 require "db.connect.php";
 $stmt = $connexion->prepare("SELECT  distinct Users.pseudo , Users.email , Votes.vote FROM users INNER JOIN votes ON Users.unique_id = Votes.voteman_id ");
 $stmt->execute();
 if($stmt->execute() ==  true)
 {
  $output1.= "<th>Pseudo</th><th>Email</th><th>Vote</th>";
  echo $output1;
  while($ligne = $stmt->fetch(PDO::FETCH_NUM))
    {
        echo "<tr>";
        foreach ($ligne as   $value) {
            echo "<td>" .$value ."</td>";
        }
        echo "</tr>";
    }
  
 }

}else
{
$output= "Connexion";
echo $output;
}
?>