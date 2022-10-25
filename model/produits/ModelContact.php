<?php
require_once "connexion.php";

class ModelContact
{
  private $id;
  private $nom;
  private $type;
  private $photo;
  private $description;

  public function __construct($id = null, $nom = null, $type = null, $photo = null, $description = null)
  {
    $this->id = $id;
    $this->nom = $nom;
    $this->type = $type;
    $this->photo = $photo;
    $this->description= $description;
  }

  public static function listeContacts()
  {
    $idcon = connexion();
    $requete = $idcon->prepare("
      SELECT * FROM pdt
    ");
    $requete->execute();
    return $requete->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function voirContact($id){
    $idcon = connexion();
    $requete = $idcon->prepare("
      SELECT * FROM pdt where id=:id;
    ");
    $requete->execute([
      ':id' => $id,
    ]);
    return $requete->fetch(PDO::FETCH_ASSOC);

  }
 
  public static function ajoutContact($nom, $type, $photo, $description)
  {
    $idcon = connexion();
    $requete = $idcon->prepare("
      INSERT INTO pdt VALUES ( null, :nom, :type, :photo, :description )
    ");
    return $requete->execute([
      ':nom' => $nom,
      ':type' => $type,
      ':photo' => $photo,
      ':description' => $description,
    ]);
  }

  public static function suppContact($id)
  {
    $idcon = connexion();
    $requete = $idcon->prepare("
      DELETE  FROM pdt where id= :id;
    ");
    return $requete->execute([
      ':id' => $id,
    ]);
  }

  public static function modifContact($nom, $type, $photo, $description)
  {
    $idcon = connexion();
    $requet = $idcon->prepare("
      UPDATE contact SET nom = :nom, type = :type, photo = :photo, decription, nom = :nom WHERE id = :id
    ");
    return $requet->execute([
      ':nom' => $nom,
      ':type' => $type,
      ':photo' => $photo,
      ':description' => $description,
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
