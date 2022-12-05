<?php
session_start();

if (isset($_SESSION['id']) && ($_SESSION['role'] === "superadmin" || $_SESSION['role'] === "directeur")) {
?>

  <!DOCTYPE html>
  <html lang="en">
  <?php require_once "../../../view/headadmin.php";
  ?>

  <body>
  <?php
  require_once "../../../view/user/admin/ViewTemplate.php";
  ViewTemplate::menu();
?>

    <?php
    require_once "../../../view/user/admin/ViewUser.php";
    require_once "../../../model/user/admin/ModelUser.php";
    require_once "../../../view/user/admin/ViewTemplate.php";

    if (isset($_POST['ajout'])) {
      $pass =  password_hash($_POST['pass'], PASSWORD_DEFAULT);

      if (ModelUser::ajoutUser($_POST['nom'], $_POST['prenom'], $_POST['login'],  $pass,   $_POST['role'])) {


        ViewTemplate::alert("success", "insertion faite avec succes", "liste.php");
      } else {
        ViewTemplate::alert("danger", "echec de l'insertion", "liste.php");
      }
    } else {
      ViewUser::ajoutUser();
    }
    ?>

    <?php
    require_once "../../../view/user/admin/ViewTemplate.php";
    ViewTemplate::footer()
    ?>
  </body>

  </html>

<?php } else {
  var_dump($_SESSION['id']);
  header('Location: connexion-user.php');
  var_dump($_SESSION[$role]);
  exit;
} ?>