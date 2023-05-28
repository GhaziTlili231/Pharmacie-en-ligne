<?php session_start() ;
include "../../includ/function.php" ; 
if(isset($_POST['btnSubmit']))
{
  //changer etet de panier 
    changerEtetPanier($_POST) ; 

}
$panier = getAllPanier() ; 
$commandes = getAllcommande();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

    <title>Admin Profil</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Pharmacie</a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="../../deconnexion.php">Deconnexion</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="home"></span>
                  Home <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../categories/list.php">
                  <span data-feather="file"></span>
                  Categories
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../produit/list.php">
                  <span data-feather="shopping-cart"></span>
                  Produit
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../visiteurs/list.php">
                  <span data-feather="users"></span>
                  Clients
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../stock/list.php">
                  <span data-feather="bar-chart-2"></span>
                  Stocks
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="../commande/list.php">
                  <span data-feather="bar-chart-2"></span>
                  Panier
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="bar-chart-2"></span> 
                  Rapports
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../profil.php">
                  <span data-feather="layers"></span>
                  Profile
                </a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Liste des Commandes </h1>
          </div>
          
          <?php   
                if (isset($_GET['ajout']) && $_GET['ajout']== "ok") 
                print '<div class="alert alert-success">
                Categorie Ajout avec succes 
              </div>' ; 
          
          
          ?>
          <?php   
                if (isset($_GET['delete']) && $_GET['delete']== "ok") 
                print '<div class="alert alert-success">
                Categorie Supprimer avec succes 
              </div>' ; 
          
          
          ?>
           <?php   
                if (isset($_GET['modif']) && $_GET['modif']== "ok") 
                print '<div class="alert alert-success">
                Categorie modifier avec succes 
              </div>' ; 
          
          
          ?>
           <!-- Liste Start  -->
          <div>
          <table class="table table-sm table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Client</th>
      <th scope="col">Total</th>
      <th scope="col">Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
        $i=0 ; 
        foreach($panier as $p)
        {
          $i++ ; 
          print'<tr>
          <th scope="row">'.$i.'</th>
          <td>'.$p['nom']."  ".$p['prenom'].'</td>
          <td>'.$p['total']. ' DTT</td>
          <td>'.$p['date_creation'].'</td>
          <td>
            <a data-toggle="modal" data-target="#Commandes'.$p['id'].'" class="btn btn-success ">Afficher</a>
            <a data-toggle="modal" data-target="#traiter'.$p['id'].'" class="btn btn-primary">Traiter </a>
          </td>
        </tr>'  ;
        }
             ?>
             
             
  </tbody>
</table>
          </div>
        </main>
      </div>
    </div>

    <?php  foreach($panier as $index => $p)  { ?>
  
        <!-- Modal modifier-->
      <div class="modal fade" id="Commandes<?php echo $p['id'] ; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Liste des Commandes</h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                  </div>
                <div class="modal-body">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Nom Produit: </th>
                          <th>Image:</th>
                          <th>Quantite:</th>
                          <th>Total:</th>
                          <th> Panier:</th>
                        </tr>
                        
                      </thead>
                      <tbody>
                        <?php
                          foreach($commandes as $index => $c)
                          {
                            if($c['panier'] == $p['id']) // si commandes appartient le panier ouvert affiche 
                            {

                            
                            print'<tr>
                              <td>'.$c['nom'].'</td>
                              <td><img src="../../img/'.$c['image'].'" width ="100"/></td>
                              <td>'.$c['quantite'].'</td>
                              <td>'.$c['total'].'</td>
                              <td>'.$c['panier'].'</td>
                            </tr>';
                          }
                          }
                        ?>
                      </tbody>
                    </table>
                </div>
                </div>
                <div class="modal-footer">

                </div>
              </div>
              </div>           
      <?php   }?>

                          
    <?php  foreach($panier as $index => $p)  { ?>
  
  <!-- Modal modifier-->
<div class="modal fade" id="traiter<?php echo $p['id'] ; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Traiter les Commandes</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
            </div>
          <div class="modal-body" >

              <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">

                <input type="hidden" value="<?php $p['id'] ; ?>" name="panier_id">
                <div class="form-group">

                  <select name="etat" class="form-control">
                      <option value="en livraison">En livraison</option>
                      <option value="livraison terminer">Livraison termine</option>
                  </select>
                </div>
                <div class="form-group">
                  <button type="submit" name="btnSubmit" class="btn btn-primary">Sauvgarder</button>
                </div>
               
              </form>
          </div>
          </div>
          <div>
          <div class="modal-footer">

          </div>
        </div>
        </div>
        </div>           
<?php   }?>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.1/dist/Chart.min.js"></script>
    <script>
      function popUpDeleteCtegorie()
      {
        return confirm("Vouez- vous vraiment supprimer la categorie ?  ") ; 
      }
    </script>
  </body>
</html>
