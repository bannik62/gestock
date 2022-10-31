
  <?php
  require_once "../../view/produits/ViewProduit.php";
  require_once "..../model/produits/ModelProduit.php";
  require_once "../../view/produits/ViewTemplate.php";

  ViewTemplate::menu();
 
  if(isset($_POST['ajout'])){
    if(ModelProduit::ajoutProduit($_POST['nom'], $_POST['ville'], $_POST['code_postal'],  $_POST['longi'], $_POST['lat'],$_POST['description'])) {
      ViewTemplate::alert("success", "insertion faite avec succes", "liste.php");
    }
    else {
      ViewTemplate::alert("danger", "echec de l'insertion", "ajout.php");
    }
  }
  else {
    ViewProduit::ajoutProduit();
  }
  

  ?>
