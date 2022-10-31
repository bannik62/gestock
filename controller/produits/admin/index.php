<!DOCTYPE html>
<html lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
 <?php require_once "../../../view/head.php"?>
    <?php require_once "../../../view/navabar.php"?>



  <?php
  require_once "../../../view/produits/admin/ViewProduit.php";
  require_once "../../../view/produits/admin/ViewTemplate.php";

  ViewProduit::listeProduit();
  

  ?>
