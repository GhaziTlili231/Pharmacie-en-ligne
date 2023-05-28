<?php
$idvisiteurs = $_GET['id'] ; 

// 2 ) connecter la basse de donnes 

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

  // 3 ) creation de la requette 

  $requette = "UPDATE visiteurs SET etat=1 WHERE id ='$idvisiteurs' " ; 

  // 4) execution de la requette 

    $resultat =  $conn->query($requette) ; 

    if($resultat)
    {
        header ('Location:list.php?valider=ok') ; 

    }else 
    {
        echo "Erreur de validation " ; 
    }
?>