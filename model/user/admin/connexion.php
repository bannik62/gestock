<?php
function connexion()
{
  // création des variable de connection 
  $servername = "localhost";
  $username = "root";
  // password facultatif sur php myadmin par defaut
  $password = "";
  $dbname = "nom_de_la_bdd";
  try {
    // création d'une nouvelle instance PDO contenant la requete 
    $idcon = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    // return de la varibles$idcon
    return $idcon;
    // message en cas d'erreur
  } catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    return FALSE;
    exit();
  }
}
