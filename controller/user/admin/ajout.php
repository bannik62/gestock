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

?>
<!DOCTYPE html>
<html lang="en">
<?php require_once "../../../view/headadmin.php";
?>

<body>
  <?php
  require_once "../../../view/user/admin/ViewTemplate.php";
  ViewTemplate::menu()
  ?>

    <?php
    require_once "../../../view/user/admin/ViewUser.php";
    require_once "../../../model/user/admin/ModelUser.php";
    require_once "../../../view/user/admin/ViewTemplate.php";

    if (isset($_POST['ajout'])) {
      $pass =  password_hash($_POST['pass'], PASSWORD_DEFAULT);
      var_dump($_POST['pass']);
      if (ModelUser::ajoutUser($_POST['nom'], $_POST['prenom'], $_POST['login'],  $pass,   $_POST['role'])) {
        var_dump($_POST['pass']);

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