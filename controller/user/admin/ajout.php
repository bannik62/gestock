
  <!DOCTYPE html>
<html lang="en">
  <?php
  require_once "../../view/headadmin.php";  
  require_once "../../view/navadmin.php";  

  ?>
  
  <?php
  require_once "../../view/user/admin/ViewUser.php";
  require_once "../../model/user/admin/ModelUser.php";
  require_once "../../view/user/admin/ViewTemplate.php";


 
  if(isset($_POST['ajout'])){
    if(ModelUser::ajoutUser( $_POST['nom'],$_POST['prenom'],$_POST['login'],  $_POST['pass'],   $_POST['role'])) {
      ViewTemplate::alert("success", "insertion faite avec succes", "liste.php");
    }
    else {
      ViewTemplate::alert("danger", "echec de l'insertion", "liste.php");
    }
  }
  else {
    ViewUser::ajoutUser();
  }
  

  ?>
