<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <?php require_once "../../../view/headadmin.php" ?>
  <?php require_once "../../../view/produits/noneadmin/ViewTemplate.php";
  ViewTemplate::menu();
  ?>
  <?php
  require_once "../../../view/produits/noneadmin/ViewProduit.php";
  require_once "../../../view/produits/noneadmin/ViewTemplate.php";
  ViewProduit::listeProduit();
  ?>
</body>

</html>