<?php 
session_start() ; 

/// 1 ) recuperation des donnes de la formulaire 

$id = $_POST['idc'] ; 
$nom = $_POST ['nom'] ; 
$description = $_POST ['description'] ; 
$createur = $_SESSION['id'] ; 
$date_modification = date("Y-m-d") ; 
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

$sql2 = "UPDATE categories SET nom ='$nom',description ='$description' , date_modification = '$date_modification' WHERE id ='$id'" ;
            /* INSERT INTO categories(nom,description,createur) VALUES('eaze','WJAYA', 5); */ 
// 4) execution de la requette 

$resultat =  $conn->query($sql2) ; 
if($resultat)
    {
        header ('Location:list.php?modif=ok') ; 

    }

echo "nom = $nom  desc= $description cre =$createur    date = $date_creation"  ; 

?> 