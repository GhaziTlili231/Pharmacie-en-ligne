<?php  
session_start() ; 
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
      <div class="row col-12 mt-4">


      <?php
               foreach($produits as $produit) 
               {
                    print '<div class="col-3 mt-2">
                    <div class="card border-light mb-3" style="max-width: 18rem;">
                      <img src="img/'.$produit['image'].'" width="300" height="300"" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">'.$produit['nom'].'</h5>
                          <p class="card-text">'.$produit['description'].'</p>
                        <a href="produit.php?id='.$produit['id'].'"class="btn btn-primary">afficher </a>
                      </div>
                  </div>
                </div> ' ; 

               }
       ?>

        <?php
          include "includ/footer.php";
         ?> 



      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</html>