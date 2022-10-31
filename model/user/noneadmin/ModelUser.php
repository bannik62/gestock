
<?php
require_once "connexion.php";

class ModelUser
{



  public static function connexionUser($login)
  {
    $idcon = connexion();
    $requete = $idcon->prepare("
      SELECT * FROM user WHERE login = :login
    ");

    $requete->execute([
      ':login' => $login,
    ]);


    return $requete->fetch(PDO::FETCH_ASSOC);
  }

  private $id;
  private $nom;
  private $prenom;
  private $login;
  private $pass;
  private $role;

  public function __construct($id = null, $nom = null, $prenom = null, $login = null, $pass = null, $role = null)
  {
    $this->id = $id;
    $this->nom = $nom;
    $this->prenom = $prenom;
    $this->login = $login;
    $this->pass = $pass;
    $this->role = $role;
  }

  public static function listeUser()
  {
    $idcon = connexion();
    $requete = $idcon->prepare("
      SELECT * FROM user
    ");
    $requete->execute();
    return $requete->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function voirUser($id)
  {
    $idcon = connexion();
    $requete = $idcon->prepare("
      SELECT * FROM user where id=:id;
    ");
    $requete->execute([
      ':id' => $id,
    ]);
    return $requete->fetch(PDO::FETCH_ASSOC);
  }


  public static function ajoutUser($nom, $prenom, $login, $pass, $role)
  {

    $idcon = connexion();
    // preparation requete preparé securisé
    $requete = $idcon->prepare("
     
       INSERT INTO user VALUES (null,:nom , :prenom ,:login, :pass, :role)  
   ");
    $test = $requete->execute(
      [

        ':login' => $login,
        ':pass' => $pass,
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':role' => $role,

      ]
    );
 
    return $test;
  }

  public static function suppUser($id)
  {
    $idcon = connexion();
    $requete = $idcon->prepare("
      DELETE  FROM user where id= :id;
    ");
    return $requete->execute([
      ':id' => $id,
    ]);
  }

  public static function modifUser($id, $nom, $prenom, $login, $pass, $role)
  {
    $idcon = connexion();
    $requet = $idcon->prepare("
    UPDATE `user` SET `id`='[:id]',`nom`='[:nom]',`prenom`='[:prenom]',`login`='[:login]',`pass`='[:pass]',`role`='[:role]' WHERE `id`='[:id]'    ");
    return $requet->execute([
      ':nom' => $nom,
      ':prenom' => $prenom,
      ':login' => $login,
      ':pass' => $pass,
      ':role' => $role,
      ':id' => $id,
    ]);
  }

  /*
  
  GETTERS ET SETTERS

  */

  public function getId()
  {
    return $this->id;
  }

  public function getLogin()
  {
    return $this->login;
  }

  public function getPass()
  {
    return $this->pass;
  }

  public function getNom()
  {
    return $this->nom;
  }

  public function getPremom()
  {
    return $this->prenom;
  }

  public function getRole()
  {
    return $this->role;
  }
}
