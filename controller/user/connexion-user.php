<?php
session_start();
require_once "../../view/headadmin.php";
require_once "../../view/user/noneadmin/ViewUser.php";
require_once "../../model/user/noneadmin/ModelUser.php";
?>
<!doctype html>
<html lang="fr">
<body>
<?php
require_once "../../view/user/noneadmin/ViewTemplate.php";
ViewTemplate::menu()
?>
 <h1 class="text-center">Bienvenue veuillez vous connectez </h1>

  <?php
  include_once "../../view/user/noneadmin/ViewUser.php";
  require_once "../../model/user/noneadmin/ModelUser.php";
  // page receptrice :  j'ai des données dans POST
  if (isset($_POST['connexion'])) {
    $userData = ModelUser::connexionUser($_POST['login']);
    // test si user existe (userData n'est pas vide, donc == true) && il faut qu'il ait le bon mdp
    // couple login et mdp est bon
    if ($userData && password_verify($_POST['pass'], $userData['pass'])) {
      // creation de la session
      $_SESSION['id']     = $userData['id'];
      $_SESSION['nom']    = $userData['nom'];
      $_SESSION['prenom'] = $userData['prenom'];
      $_SESSION['role']   = $userData['role'];
      // redirection vers la page admin s'il a la role admin
      if ( $_SESSION['role'] === 'admin' || $_SESSION['role'] === 'directeur') {
        var_dump($_SESSION);
        header('Location: admin/admin.php');
      }
      // redirection vers la page accueil s'il a la role user
      if ($_SESSION['role'] === 'user' ) {
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