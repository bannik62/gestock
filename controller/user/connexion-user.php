<!doctype html>
<html lang="fr">
<?php
session_start();
require_once "../../view/headadmin.php";

?>

<body>
  <?php
  require_once "../../view/navabar.php";
?>
  <h1 class="text-center">Bienvenue veuillez vous connectez <br>pour geré vos stocks</h1>

  <?php
  require_once "../../view/user/noneadmin/ViewUser.php";
  require_once "../../model/user/noneadmin/ModelUser.php";
  // page receptrice :  j'ai des données dans POST
  if (isset($_POST['connexion'])) {


    $userData = ModelUser::connexionUser($_POST['login']);
    // test si user existe (userData n'est pas vide, donc == true) && il faut qu'il ait le bon mdp
    // couple login et mdp est bon
    if ($userData && password_verify($_POST['pass'], $userData['pass'])) {
      // creation ds variable de session  la session 
      $_SESSION['id']     = $userData['id'];
      $_SESSION['prenom'] = $userData['prenom'];
      $_SESSION['role']   = $userData['role'];
      $_SESSION['nom']    = $userData['nom'];
      // redirection vers la page admin s'il a la role admin ,directeur ,superadmin
      if (isset($_SESSION['id']) && ($_SESSION['role'] === "admin" || $_SESSION['role'] === "directeur")) {
        header('Location: admin/admin.php');
      }
      // vers le dashboard super admin
      elseif (($_SESSION['role'] === "superadmin")) {
        header('Location: admin/superboard.php');
      }

      // redirection vers la page accueil s'il a la role user
      if ($_SESSION['role'] === 'user') {
        header('Location: noneadmin/index.php');
      }
    }
    // erreur des identifiants
    else {

      header('Location: ../../index.php');
    }
  }
  // page emettrice
  else {
    // affichage du formulaire
    ViewUser::connexion();
  }
  ?>
  <?php
  require_once "../../view/user/noneadmin/ViewTemplate.php";
  ViewTemplate::footer()
  ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

</body>

</html>