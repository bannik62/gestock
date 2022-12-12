<?php
// ici nous testons si j'ai des données dans POST
if (isset($_POST['connexion'])) {

  // test si user existe (userData n'est pas vide, donc == true) insertion
  // du login dans un model avant de le mettre dans une  $variable
  $userData = ModelUser::connexionUser($_POST['login']);

  // couple login et mdp est bon
  if ($userData && password_verify($_POST['pass'], $userData['pass'])) {

    // création ds variable de $ssession global selon les données recuillie a l'inscription 
    $_SESSION['id']     = $userData['id'];
    $_SESSION['prenom'] = $userData['prenom'];
    $_SESSION['role']   = $userData['role'];
    $_SESSION['nom']    = $userData['nom'];
    // redirection vers la page admin s'il a la role admin ,directeur ,superadmin
    if (isset($_SESSION['id']) && ($_SESSION['role'] === "enseignant")) {
      header('Location: admin/admin.php');
    }
    // vers le dashboard  admin
    elseif (($_SESSION['role'] === "superadmin")) {
      header('Location: redirection autorisé');
    }

    // redirection vers la page accueil s'il a la role user
    if ($_SESSION['role'] === 'user') {
      header('Location:  redirection a la page d\'utilisateur  ');
    }
  }
  // erreur des identifiants
  else {

    header('refus de connexion retour a la case départ');
  }
}
// page emettrice
else {
  // affichage du formulaire si  le bouton submit
  //  dessus et activé nous passons a la condition initial du if
  ViewUser::connexion();
}


