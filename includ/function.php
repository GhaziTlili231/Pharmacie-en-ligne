<?php
function connect()
{
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

  
}
function getAllCategories(){
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

$requette = "SELECT * FROM categories" ; 



// 3 -  execution de la requette 

$resultat = $conn->query($requette) ; 


// 4 - resulta de la requette 

$categories = $resultat->fetchAll();

//var_dump($categories);  
return $categories ; 
}



function getAllProduct()
{
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

$requette = "SELECT * FROM produit" ; 



// 3 -  execution de la requette 

$resultat = $conn->query($requette) ; 


// 4 - resulta de la requette 

$produit = $resultat->fetchAll();

//var_dump($categories);  
return $produit ; 
}

function serachProduit($keywards)
{

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





// 2 - creation de la requetet                          nasn3ou hne le categorie men basse w mba3ed affichage 
   $requette = "SELECT * fROM produit WHERE nom LIKE '%$keywards%' " ; 




// 3 -  execution de la requette 

   $resultat = $conn->query($requette) ; 



// 4 - resulta de la requette 

$produits = $resultat->fetchAll();

//var_dump($categories);  
return $produits ; 


}


function getAllProduitById($id)
{
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

  
  // $conn = connect(); 
  // 1 - creation de la requetet                          
  $requette = "SELECT * FROM produit WHERE id =$id"; 

  // 2 -  execution de la requette 

  $resultat = $conn->query($requette) ; 



  // 3 - resulta de la requette 
  
  $produit = $resultat->fetch();

  return $produit ; 
}


function addvisiteur($data)
{

$conn= connect() ; 

$requette = "INSERT INTO visiteur(nom,prenom,telephone,email,pass) 
VALUES ('". $data['nom']. "','". $data ['prenom']. "','". $data ['telephone']. "','". $data ['email']. "','". $data ['pass']. "')";
// 3 -  execution de la requette 

$resultat = $conn->query($requette) ; 

// 3 - resulta de la requette 

return $resultat;


}


function connectVisiteur($data)
{
  $servername="localhost";
  $DBUser = "root";
  $DBpassword = "" ; 
  $DBname ="pharmacie" ; 
  
  try {
      $conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBUser, $DBpassword);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // echo "Connected successfully";
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
    $email = $data['email'] ; 
    $pass = $data['pass'] ; 
    $requette =  "SELECT * FROM visiteurs WHERE email ='$email' AND pass ='$pass'" ; 


    // 2 -  execution de la requette 

    $resultat = $conn->query($requette) ; 

    $user = $resultat->fetch() ; 
    // 3 - resulta de la requette 
    var_dump($user) ;

    return $user ; 
   /*if ($resultat) {
      header("Location: profil.php?success=Your account has been created successfully");
   }else {
       header("Location: connexion.php?error=unknown error occurred&$user_data");
   }

*/
  }
  function connectAdmin($data)
{
  $servername="localhost";
  $DBUser = "root";
  $DBpassword = "" ; 
  $DBname ="pharmacie" ; 
  
  try {
      $conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBUser, $DBpassword);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // echo "Connected successfully";
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
    $email = $data['email'] ; 
    $pass = $data['pass'] ; 
    $requette =  "SELECT * FROM administrateur WHERE email ='$email' AND pass ='$pass'" ; 


    // 2 -  execution de la requette 

    $resultat = $conn->query($requette) ; 

    $user = $resultat->fetch() ; 
    // 3 - resulta de la requette 
    var_dump($user) ;

    return $user ; 
   /*if ($resultat) {
      header("Location: profil.php?success=Your account has been created successfully");
   }else {
       header("Location: connexion.php?error=unknown error occurred&$user_data");
   }

*/
  }


function getAllUsers()
{
  
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

$requette = "SELECT * FROM visiteurs WHERE etat=0 " ; 



// 3 -  execution de la requette 

$resultat = $conn->query($requette) ; 


// 4 - resulta de la requette 

$users = $resultat->fetchAll();

return $users ; 
}


function getStock()
{
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





// 2 - creation de la requette       
$requette ="SELECT p.nom,s.quantite,s.id FROM produit p, stock s WHERE p.id = s.produit" ;

$resultat = $conn->query($requette) ; 
$stocks = $resultat->fetchall() ; 
return $stocks ; 

}
function getAllPanier()
{
  
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

$requette = "SELECT v.nom,v.prenom,v.telephone,p.total,p.etat,p.date_creation , p.id FROM panier p,visiteurs v WHERE p.visiteur = v.id" ; 



// 3 -  execution de la requette 

$resultat = $conn->query($requette) ; 


// 4 - resulta de la requette 

$panier = $resultat->fetchAll();

return $panier ; 
}

function getAllcommande()
{
  
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

$requette = "SELECT p.nom, p.image, c.quantite, c.total, c.panier FROM commandes c , produit p WHERE c.produit = p.id" ; 



// 3 -  execution de la requette 

$resultat = $conn->query($requette) ; 


// 4 - resulta de la requette 

$commandes = $resultat->fetchAll();

return $commandes ; 
}

function  changerEtetPanier($data)
{
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
 
 $requette = "UPDATE panier SET etat='".$data['etat']."' WHERE id='".$data['panier_id']."' "; 
 
 
 
 // 3 -  execution de la requette 
 
 $resultat = $conn->query($requette) ; 
 
 
 
}


?> 