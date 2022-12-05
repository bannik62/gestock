<?php
session_start();

if (isset($_SESSION['id']) && ($_SESSION['role'] === "superadmin" ||  $_SESSION['role']=== "directeur" ||  $_SESSION['role']=== "admin" )) {


 
?>
<!doctype html>
<html lang="fr">
<?php require_once "../../../view/headadmin.php"; ?>

<body>
  <?php
  require_once "../../../view/user/admin/ViewTemplate.php";
  ViewTemplate::menu();
?>
  <div class="container list " style="width:100% ;">

    <?php
    require_once "../../../view/user/admin/ViewUser.php";
    require_once "../../../view/user/admin/ViewTemplate.php";
    require_once "../../../model/user/admin/ModelUser.php";

    $liste = ModelUser::listeUser();
    ViewUser::listeUser($liste);

    ?>
  </div>
  <?php ViewTemplate::footer(); ?>
</body>

</html>
<?php } else {
  var_dump($_SESSION['id']);
  var_dump($_SESSION['role']);

  header('Location: connexion-user.php');
  exit;
}?>