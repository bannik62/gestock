
<?php
require_once "connexion.php";


class ModelUser
{
  public static function ajoutUser($nom,$ville,$code_postal,$longi,$lat,$directeur)
  {
    $idcon = connexion();
    // preparation requete preparé securisé
    $requete = $idcon->prepare("
       INSERT INTO user VALUES (null, :nom, :ville, :code_postal, :longi, :lat,:directeur)  
   ");
    return $requete->execute( 
      [
        ':nom' => $nom,
        ':prenom' =>$ville,
        ':mail' => $code_postal,
        ':pass' => $longi, 
        ':role' => $lat,
        ':directeur'=>$directeur
      ]
    );
  }

  public static function connexionUser($mail)
  {
    $idcon = connexion();
    $requete = $idcon->prepare("
      SELECT * FROM user WHERE login = :login
    ");

    $requete->execute([
      ':login' => $mail,
    ]);


    return $requete->fetch(PDO::FETCH_ASSOC);
  }
}
