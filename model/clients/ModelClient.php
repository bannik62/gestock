<?php
require_once "connexion.php";

class ModelClient
{
  private $id;
  private $nom;
  private $prenom;
  private $mail;
  private $tel;

  public function __construct($id, $nom = null, $prenom = null, $mail = null, $tel = null)
  {
    $this->id = $id;
    $this->nom = $nom;
    $this->prenom = $prenom; 
    $this->mail = $mail;
    $this->tel = $tel;
  }

  public static function listeClient()
  {
    $idcon = connexion();
    $requete = $idcon->prepare("
      SELECT * FROM contact
    ");
    $requete->execute();
    return $requete->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function voirClient($id){
    $idcon = connexion();
    $requete = $idcon->prepare("
      SELECT * FROM contact where id=:id;
    ");
    $requete->execute([
      ':id' => $id,
    ]);
    return $requete->fetch(PDO::FETCH_ASSOC);

  }

  public static function ajoutClient( $id,$nom, $prenom, $mail, $tel)
  {
    $idcon = connexion();
    $requete = $idcon->prepare("
      INSERT INTO contact VALUES (?, :nom, :prenom, :mail, :tel )
    ");
    return $requete->execute([
      ':id' => $id,
      ':nom' => $nom,
      ':prenom' => $prenom,
      ':mail' => $mail,
      ':tel' => $tel,
    ]);
  }

  public static function suppClient($id)
  {
    $idcon = connexion();
    $requete = $idcon->prepare("
      DELETE  FROM contact where id= :id;
    ");
    return $requete->execute([
      ':id' => $id,
    ]);
  }

  public static function modifClient($id, $nom, $prenom, $mail, $tel)
  {
    $idcon = connexion();
    $requet = $idcon->prepare("
      UPDATE contact SET nom = :nom, prenom = :prenom, mail = :mail, tel = :tel WHERE id = :id
    ");
    return $requet->execute([
      ':id' => $id,
      ':nom' => $nom,
      ':prenom' => $prenom,
      ':mail' => $mail,
      ':tel' => $tel
    ]);
  }

  /*
  
  GETTERS ET SETTERS

  */

  public function getId()
  {
    return $this->id;
  }

  public function getNom()
  {
    return $this->nom;
  }

  public function getPrenom()
  {
    return $this->prenom;
  }

  public function getMail()
  {
    return $this->mail;
  }

  public function getTel()
  {
    return $this->tel;
  }


}
