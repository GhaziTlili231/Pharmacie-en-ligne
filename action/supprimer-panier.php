<?php 
session_start(); 
$id = $_GET['id'];  
echo $id ; 
$total_enliver = $_SESSION['panier'][3][$id][1] ; 
$_SESSION['panier'][1]-=$total_enliver ; 
unset($_SESSION['panier'][3][$id]) ; 

header("Location:../panier.php");

?>