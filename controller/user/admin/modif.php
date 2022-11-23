<?php

session_start();

if (isset($_SESSION['id']) && ($_SESSION['role'] === "admin" ||  $_SESSION['role']=== "directeur")) {
  $html = '<h1 class="text-center" ><u>interface administrateur</u></h1>';
  $html .= '<h2 class="text-center" > Bonjour ' . $_SESSION['prenom'] . " " . $_SESSION['nom'] . "<h2>";
} else {
  var_dump($_SESSION['id']);
  var_dump($_SESSION['role']);

  // header('Location: connexion-user.php');
  exit;
}

require_once "../../../view/user/admin/ViewUser.php";
require_once "../../../model/user/admin/ModelUser.php";
?>
<!DOCTYPE html>
<html lang="fr">
<?php 
require_once "../../../view/headadmin.php";
 ?>
  <body>
  <?php
   require_once "../../../view/user/admin/ViewTemplate.php";
   ViewTemplate::menu()
   ?>
  <div>
<?php  

if (isset($_GET['id'])) {
  if (ModelUser::voirUser($_GET['id'])) {
    ViewUser::modifUser($_GET['id']);
  } else {
    echo "ce contact n'existe pas";
  }
} else {
  if (isset($_POST['id']) && ModelUser::voirUser($_POST['id'])) {
    if (ModelUser::modifUser($_POST['id'], $_POST['nom'], $_POST['prenom'], $_POST['login'], $_POST['pass'], $_POST['role'])) {
      ViewTemplate::alert("success", "maj faite avec succes", "liste.php");
    } else {
      ViewTemplate::alert("danger", "échec de la mise à jour", "liste.php");
    }
  } else {
    ViewTemplate::alert("danger", "aucune donnée n'a été transmise");
  }
}


ViewTemplate::footer();
?>

      </div>
  </body>

</html>