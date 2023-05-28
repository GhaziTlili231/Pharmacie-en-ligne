<?php  
session_start() ;
$total = 0 ; 
if(isset($_SESSION['panier'])) 

{
  $total = $_SESSION['panier'][1] ;
}

include "includ/function.php" ;
  $categories = getAllCategories();

    if(!empty($_POST))
    {
        // button search clicked 
        // echo  "button search clicked  fef ef " ;
        $produits = serachProduit($_POST['search']);
    }
    else
    {
      $produits = getAllProduct() ;
    }
$commandes = array();
    if(isset($_SESSION['panier']))
     {
        if( count($_SESSION['panier'][3]) > 0){
                $commandes = $_SESSION['panier'][3] ;}  
     }
?> 
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pharmacie </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    
        <?php
          include "includ/header.php";
         ?> 
      <div class="row col-12 mt-4 p-4">

            <h1>Panier utilisateur </h1>
            <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">produit</th>
                            <th scope="col">Quantite</th>
                            <th scope="col">Total</th>
                            <th scope="col">Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  foreach($commandes as $index => $commande)
                            {

                    
                            print'<tr>
                            <th scope="row">'.($index+1).'</th>
                            <td>'.$commande[5].'</td>
                            <td>'.$commande[0].'</td>
                            <td>'.$commande[1].'TND</td>
                            <td><a class="btn btn-danger" href="action/supprimer-panier.php?id='.$index.'">Supprimer <a ></td>
                            </tr>' ; 
                                  }  ?>
                        </tbody>
                        </table>
            <div class="text-end mt-3">
              <h3>TOTAL : <?php echo $total ;  ?> DTT</h3>
            
            <hr>
            <a href="action/valider-panier.php" class="btn btn-success" style="width:100px">Valider </a>
            </div>                       
        <?php
          include "includ/footer.php";
         ?> 



      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</html>