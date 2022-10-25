
  <?php
  require_once "../../view/produits/ViewContact.php";
  require_once "..../model/produits/ModelContact.php";
  require_once "../../view/produits/ViewTemplate.php";

  ViewTemplate::menu();
 
  if(isset($_POST['ajout'])){
    if(ModelContact::ajoutContact($_POST['nom'], $_POST['ville'], $_POST['code_postal'],  $_POST['longi'], $_POST['lat'],$_POST['?'])) {
      ViewTemplate::alert("success", "insertion faite avec succes", "liste.php");
    }
    else {
      ViewTemplate::alert("danger", "echec de l'insertion", "ajout.php");
    }
  }
  else {
    ViewContact::ajoutContact();
  }
  

  ?>
