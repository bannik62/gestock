  <?php require_once "../../view/head.php"?>
    <?php require_once "../../view/navabar.php"?>



<a class="btn btn-info ms-5" href="javascript:history.go(-1)">Retour interface admin</a>
  <?php
  require_once "../../view/produits/ViewContact.php";
  require_once "../../view/produits/ViewTemplate.php";

  ViewContact::listeContacts();
  ?>
