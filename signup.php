<?php  
session_start() ; 
if(isset($_SESSION['nom']))
{

    header('location:profil.php') ; 
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="signup-check.php" method="post">
     	<h2>SIGN UP</h2>
          
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

          <label>Nom</label>
          <?php if (isset($_GET['name'])) { ?>
               <input type="text" 
                      name="name" 
                      placeholder="Name"
                      value="<?php echo $_GET['name']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="name" 
                      placeholder="Name"><br>
          <?php }?>

          <label>Prenom</label>
          <?php if (isset($_GET['uname'])) { ?>
               <input type="text" 
                      name="uname" 
                      placeholder="User Name"
                      value="<?php echo $_GET['uname']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="uname" 
                      placeholder="User Name"><br>
          <?php }?>
          <label>Adresse</label>
          <?php if (isset($_GET['adresse'])) { ?>
               <input type="text" 
                      name="adresse" 
                      placeholder="Name"
                      value="<?php echo $_GET['adresse']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="adresse" 
                      placeholder="Name"><br>
          <?php }?>


     	<label>Mot de Passe</label>
     	<input type="password" 
                 name="password" 
                 placeholder="Password"><br>

          <label>Confirmer</label>
          <input type="password" 
                 name="re_password" 
                 placeholder="Re_Password"><br>

     	<button type="submit">Sign Up</button>
          <a href="index.php" class="ca">Already have an account?</a>
     </form>
</body>


</html>