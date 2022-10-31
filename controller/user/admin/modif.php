<?php
require_once "../../../view/headadmin.php";
require_once "../../../view/user/admin/ViewUser.php";
require_once "../../../view/user/admin/ViewTemplate.php";
require_once "../../../model/user/admin/ModelUser.php";
require_once "../../../view/navabar.php";




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

<!DOCTYPE html>
<html lang="fr">