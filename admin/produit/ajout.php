<?php
session_start() ; 


$nom=$_POST['nom'] ; 
$description = $_POST['description'] ; 

$prix = $_POST['prix'] ; 
$createur = $_POST['createur'] ; 

$categorie = $_POST['categorie'] ; 
$quantite = $_POST['quantite'] ; 
$date_creation = date('Y-m-d') ; 

// upload image 


$target_dir = "../../img/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);


if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $image= $_FILES["image"]["name"];
  } else {
    echo "Sorry, there was an error uploading your file.";
  }

$date= date('Y-m-d') ;



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

$sql2 = "INSERT INTO produit(nom,description,prix,image,createur,categorie,date_creation) VALUES('$nom','$description','$prix','$image',$createur,'$categorie','$date')" ;


  // 4) execution de la requette 

$resultat =  $conn->query($sql2) ; 

if($resultat)
    {
      $produit_id = $conn->lastInsertId(); 


      $requette = "INSERT INTO stock(produit,quantite,createur,date_creation) VALUES('$produit_id','$quantite','$createur','$date_creation')" ; 
          if($conn->query($requette))
           {
     
             header ('Location:list.php?ajout=ok') ; 
             } 
            else
           {
             echo "impossible d'ajouter le stock du produit " ; 
             }
    }

echo "nom = $nom  desc= $description cre =$createur    date = $date_creation"  ; 


?>