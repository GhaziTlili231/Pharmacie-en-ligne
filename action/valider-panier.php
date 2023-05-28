<?php
session_start() ;
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

 $visiteur = $_SESSION['id'] ; 
 $total = $_SESSION['panier'][1] ; 
 $date = date('Y-m-d') ; 
 //creation de panier 
  $requette_panier = "INSERT INTO panier(visiteur,total,date_creation)VALUES('$visiteur',$total,'$date')" ; 
  // 3 -  execution de la requette  panier

  $resultat3 = $conn->query($requette_panier) ; 
  $panier_id =  $conn->lastInsertId();

  $commandes =$_SESSION['panier'][3] ; 
foreach($commandes as $commande )
{

// 1 - 
$id_quantite = $commande[0] ; 
$total = $commande[1] ; 
$id_produit = $commande[4] ; 
// 2 - creation de la requette   // Ajouter Commande 

$requette2 = "INSERT INTO commandes(produit,quantite,total,panier,date_creation,date_modification) VALUES('$id_produit','$id_quantite','$total','$panier_id','$date','$date')" ; 
// 3 -  execution de la requette 

$resultat2 = $conn->query($requette2) ; 

}

//supprimer le panier 
$_SESSION['panier'] = null ; 

//redirection vers la page index ; 
header("location:../index.php") ; 



?>