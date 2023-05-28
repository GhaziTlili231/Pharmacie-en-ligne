<?php 
session_start() ; 

/// 1 ) recuperation des donnes de la formulaire 


$nom = $_POST ['nom'] ; 
$description = $_POST ['description'] ; 
$createur = $_SESSION['id'] ; 
$date_creation = date("Y-m-d") ; 
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

$sql2 = "INSERT INTO categories(nom,description,createur,date_creation) VALUES('$nom','$description', $createur,'$date_creation')" ;
            /* INSERT INTO categories(nom,description,createur) VALUES('eaze','WJAYA', 5); */ 
// 4) execution de la requette 

$resultat =  $conn->query($sql2) ; 
if($resultat)
    {
        header ('Location:list.php?ajout=ok') ; 

    }

echo "nom = $nom  desc= $description cre =$createur    date = $date_creation"  ; 

?> 