<h1>page de Connexion</h1>

<?php
require_once "/wamp64/www/gestock/view/ViewUser.php";
require_once "/wamp64/www/gestock/model/ModelUser.php";
// page receptrice :  j'ai des données dans POST
if (isset($_POST['connexion'])) {
  $userData = ModelUser::connexionUser($_POST['login']);
  var_dump($userData);
  // test si user existe (userData n'est pas vide, donc == true) && il faut qu'il ait le bon mdp
  // couple login et mdp est bon
  var_dump($_POST);
    var_dump($userData['pass']);
  if ($userData && password_verify($_POST['pass'], $userData['pass'])) {
    
   

    // creation de la session
    $_SESSION['id'] = $userData['id'];
    $_SESSION['nom'] = $userData['nom'];
    $_SESSION['prenom'] = $userData['prenom'];
    $_SESSION['role'] = $userData['role'];
    // redirection vers la page admin s'il a la role admin
    if ($_SESSION['role'] === 'admin') {
      // header('Location: admin.php');
      echo "<script type='text/javascript'>document.location.replace('controller/admin.php');</script>";
    }
    // redirection vers la page accueil s'il a la role user

    if ($_SESSION['role'] === 'user') {
      // header('Location: accueil.php');
      echo "<script type='text/javascript'>document.location.replace('controller/accueil.php');</script>";
    }
  }
  // erreur des identifiants
  else {
    echo "Echec d'authentification";
    echo "<a href='connexion-user.php'> Retour </a>";
  }
}
// page emettrice
else {
  // affichage du formulaire
  ViewUser::connexion();
}

?>