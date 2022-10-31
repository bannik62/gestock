<?php
session_start();

require_once "../../view/user/noneadmin/ViewUser.php";
require_once "../../model/user/noneadmin/ModelUser.php";

if (isset($_SESSION['id']) && $_SESSION['role'] === 'admin') {
  header('Location: admin/admin.php');
  exit;
}

if (isset($_SESSION['id']) && $_SESSION['role'] === 'user') {
  header('Location: noneadmin/accueil.php');
  exit;
}
?>
<!doctype html>
<html lang="fr">

<?php
require_once "../../view/headadmin.php";
require_once "../../view/navabar.php";
?>

<body>
  <h1 class="text-center">page de Connexion !!</h1>

  <?php
  include_once "../../view/user/noneadmin/ViewUser.php";
  require_once "../../model/user/noneadmin/ModelUser.php";
  // page receptrice :  j'ai des données dans POST
  if (isset($_POST['connexion'])) {
    var_dump($_POST['connexion']);
    $userData = ModelUser::connexionUser($_POST['login']);
    // test si user existe (userData n'est pas vide, donc == true) && il faut qu'il ait le bon mdp
    // couple login et mdp est bon
    if ($userData && password_verify($_POST['pass'], $userData['pass'])) {
      // creation de la session
      $_SESSION['id'] = $userData['id'];
      $_SESSION['nom'] = $userData['nom'];
      $_SESSION['prenom'] = $userData['prenom'];
      $_SESSION['role'] = $userData['role'];
      // redirection vers la page admin s'il a la role admin
      if (['role'] === 'admin') {
        var_dump($_SESSION);
        header('Location: contoller/admin/admin.php');
      }
      // redirection vers la page accueil s'il a la role user
      if ($_SESSION['role'] === 'user') {
        header('Location: noneadmin/accueil.php');
      }
    }
    // erreur des identifiants
    else {
      echo "Echec d'authentification";
      echo "<a href='index.php'> Retoure </a>";
      echo " recommence";
    }
  }
  // page emettrice
  else {
    // affichage du formulaire
    ViewUser::connexion();
  }

  ?>

</body>

</html>