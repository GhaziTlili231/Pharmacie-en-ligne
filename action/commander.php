<?php
//test user connectee 

 session_start() ; 
if(!isset($_SESSION['nom']))
{
      header('location:../connexion.php') ; 
      exit() ; 
}
$visiteur = $_SESSION['id'] ; 


// //var_dump($_POST) ; 

$id_produit =   $_POST['produit'] ; 
$id_quantite =  $_POST['quantite'] ; 
$date = date("Y-m-d") ; 
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





// // 2 - creation de la requette 

$requette = "SELECT prix,nom FROM produit WHERE id='$id_produit'  " ; 


// 3 -  execution de la requette 

$resultat = $conn->query($requette) ; 


// // 4 - resulta de la requette 

$produit = $resultat->fetch();

$total =  $id_quantite * $produit['prix'] ; 

if(!isset($_SESSION['panier'])) {
  // panier n'existe pas 
  $_SESSION['panier'] = array($visiteur,0,$date ,array()) ;
}
$_SESSION['panier'][1] +=$total; 
$_SESSION['panier'][3][]  = array($id_quantite,$total,$date,$date , $id_produit,$produit['nom']) ; 
// // echo $total ; 

//   //creation de panier 
//   $requette_panier = "INSERT INTO panier(visiteur,total,date_creation)VALUES('$visiteur',$total,'$date')" ; 
//   // 3 -  execution de la requette  panier

//   $resultat3 = $conn->query($requette_panier) ; 
//   $panier_id =  $conn->lastInsertId();


// var_dump($conn->lastInsertId());

// // 2 - creation de la requette   // Ajouter Commande 

// $requette2 = "INSERT INTO commandes(produit,quantite,total,panier,date_creation,date_modification) VALUES('$id_produit','$id_quantite','$total','$panier_id','$date','$date')" ; 


// // 3 -  execution de la requette 

// $resultat2 = $conn->query($requette2) ; 


header('location:../panier.php') ; 
?>