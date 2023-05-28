<?php  
session_start();
include "includ/function.php" ;
  $categories = getAllCategories();


  if(isset($_GET ['id']))
  {
     $produit =  getAllProduitById($_GET ['id']);
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
        <?php if(isset($_SESSION['etat']) && $_SESSION['etat'] ==  0){
         
              print '<div class="alert alert-danger">Compte non validee
              </div> ';
            }
         ?> 
         
                    <div class="row col-12 mt-4">
                    <div class="card col-8 offset-2">
                                <img src="img/<?php   echo $produit['image'] ?>" width="300" height="300" alt="...">
                                <div class="card-body">
                        <h5 class="card-title"><?php   echo $produit['nom'] ?></h5>
                        <p class="card-text"><?php   echo $produit['description'] ?></p>
                        </div>
                            <ul class="list-group list-group-flush">
                            <li class="list-group-item"><?php   echo $produit['prix'] ?></li>
                            <?php  foreach($categories as $index => $c) 
                                        if($c['id']== $produit['categorie'])
                                        {
                                          print'<button class="btn btn-success">'. $c['nom'].'</button>' ; 
                                        }
                            ?>
                             <div class="col-12">
                          <form action="action/commander.php" method="POST" class="d-flex">
                            <input type="hidden" value="<?php   echo $produit['id'] ?>" name="produit">
                            <input type="number" name="quantite" class="form-control"  step="1" placeholder="Quantite de produit...">
                            <button typr="submit" <?php  if(isset($_SESSION['etat']) && $_SESSION['etat'] == 0 ||!isset($_SESSION['etat'])) {echo "disabled" ;} ?> class="btn btn-primary">  
                              Commander 
                            </button>
                          </form>
                        </div>
                            </ul>
                        </div>
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