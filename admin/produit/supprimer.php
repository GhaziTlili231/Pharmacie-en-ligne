<?php
echo "id de produit  " .$_GET['idp']; 
$idcategories = $_GET['idp'];  
// 1 - connexion vers basse de donnes 

$servername="localhost";
$DBUser = "root";
$DBpassword = "" ; 
$DBname ="pharmacie" ; 

try {
    $conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBUser, $DBpassword);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }

  // 2 - creation de la requette                          nasn3ou hne le categorie men basse w mba3ed affichage 

  $requette = "DELETE FROM produit WHERE id = '$idcategories'" ; 



  // 4) execution de la requette 

  $resultat =  $conn->query($requette) ; 

  if($resultat)
    {
        header ('Location:list.php?delete=ok') ;
    }
    else
    {
        echo " error " ; 
    }

?>