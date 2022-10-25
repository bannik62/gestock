
  

  <?php
  require_once "/wamp64/www/gestock/view/ViewUser.php";
  require_once "/wamp64/www/gestock/model/ModelUser.php";

  // page receptrice :  il y a des données dans POST
  if (isset($_POST['ajout'])) {
    
    // hasher (chiffrer) le mdp : sécurité
    $pass =  password_hash($_POST['pass'], PASSWORD_DEFAULT);
    // insérer les données dans la base
    // test si la requete a bien abouti :  retourne true

    // var_dump($_POST['login']);
    // var_dump($_POST['pass']);
    // var_dump($_POST['nom']);
    // var_dump($_POST['prenom']);
    // var_dump(password_hash($_POST['pass'], PASSWORD_DEFAULT));
    

    if (ModelUser::ajoutUser( $_POST['nom'], $_POST['prenom'], $_POST['login'],$pass,"user")) {
  ?>
      <h1>Inscription faite avec succes </h1>
      <a href="index.php">Retour aux inscription</a>
    <?php
    }
    // s'il y a une erreur lors de l'exécution de la requete : retourne false
    else {
    ?>
      <h1> Echec de l 'inscription </h1>
      <a href="index.php"> Retour </a>
  <?php
    }
  }
  // page emettrice (pas de données dans POST) : afficher le form
  else {
    ViewUser::ajoutUser();
  }

  ?>

