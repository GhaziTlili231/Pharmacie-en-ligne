<?php  


session_start() ; 
if(isset($_SESSION['nom']))
{

    header('location:profil.php') ; 
}

include "includ/function.php" ;
  $categories = getAllCategories();
if(!empty($_POST))
{
  addvisiteur($_POST) ; 

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
                                        <!-----fin nav ------>
            <div class="col-12 p-5 ">

                <h1>Registre</h1>
                <form action="registre.php" methode="post"> 
                    <div class="mb-3">
                        <label class="form-label">Nom </label>
                        <input type="text" name="nom" class="form-control"  aria-describedby="emailHelp">
                      </div>

                      <div class="mb-3">
                        <label class="form-label">Prenom</label>
                        <input type="text" name="prenom" class="form-control" aria-describedby="emailHelp">
                      </div>


                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">telephone</label>
                        <input type="text" name="telphone" class="form-control" aria-describedby="emailHelp">
                      </div>


                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email address</label>
                      <input type="email" name="email" class="form-control"  aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input type="password"  name="pass" class="form-control" >
                    </div>
                   
                    <button type="submit" class="btn btn-primary" onclick="addvisiteur($data)">Sauvgarder</button>
                  </form>

            </div>


     <div class="bg-dark text-center p-5 mt-4">
      <p class="text-white ">
        Copyright 2022
      </p>

     </div>




      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</html>