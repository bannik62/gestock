<?php
require_once "connexion.php";

class ModelContact
{
  private $id;
  private $nom;
  private $prenom;
  private $mail;
  private $tel;

  public function __construct($id = null, $nom = null, $prenom = null, $mail = null, $tel = null)
  {
   
   $this->nom = $nom;
    $this->prenom = $prenom;
    $this->mail = $mail;
    $this->tel = $tel;
  }

  public static function listeContacts()
  {
    $idcon = connexion();
    $requete = $idcon->prepare("
      SELECT * FROM contact
    ");
    $requete->execute();
    return $requete->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function voirContact($id){
    $idcon = connexion();
    $requete = $idcon->prepare("
      SELECT * FROM contact where id=:id;
    ");
    $requete->execute([
      ':id' => $id,
    ]);
    return $requete->fetch(PDO::FETCH_ASSOC);

  }

  public static function ajoutContact($nom, $prenom, $mail, $tel)
  {
    $idcon = connexion();
    $requete = $idcon->prepare("
      INSERT INTO contact VALUES ( null, :nom, :prenom, :mail, :tel )
    ");
    return $requete->execute([
      
      ':nom'    => $nom,
      ':prenom' => $prenom,
      ':mail'   => $mail,
      ':tel'    => $tel,
    ]);
  }

  public static function suppContact($id)
  {
    $idcon = connexion();
    $requete = $idcon->prepare("
      DELETE  FROM contact where id= :id;
    ");
    return $requete->execute([
      ':id' => $id,
    ]);
  }

  public static function modifContact($id, $nom, $prenom, $mail, $tel)
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

  public function setId($id)
  {
    $this->id = $id;
    return $this;
  }

  public function setNom($nom)
  {
    $this->nom = $nom;
    return $this;
  }

  public function setPrenom($prenom)
  {
    $this->prenom = $prenom;
    return $this;
  }

  public function setMail($mail)
  {
    $this->mail = $mail;
    return $this;
  }

  public function setTel($tel)
  {
    $this->tel = $tel;
    return $this;
  }
}
