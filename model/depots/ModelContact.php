<?php
require_once "connexion.php";

class ModelContact
{
  private $id;
  private $nom;
  private $ville;
  private $code_post;
  private $longit;
  private $lat;
  private $directeur;
  
  public function __construct($id = null, $nom = null, $ville = null, $code_post= null, $longit = null, $lat = null, $directeur=null)
  {
    $this->id = $id;
    $this->nom = $nom;
    $this->ville = $ville;
    $this->code_post  = $code_post ;
    $this->longit = $longit;
    $this->lat = $lat;
    $this->directeur = $id;

  }

  public static function listeContacts()
  {
    $idcon = connexion();
    
    $requete = $idcon->prepare("
      SELECT * FROM depot
    ");
    $requete->execute();
    return $requete->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function voirContact($id){
    $idcon = connexion();
    $requete = $idcon->prepare("
      SELECT * FROM depot where id=:id;
    ");
    $requete->execute([
      ':id' => $id,
    ]);
    return $requete->fetch(PDO::FETCH_ASSOC);

  }

  public static function ajoutContact($nom, $ville, $code_post , $longit , $lat, $directeur)
  {
    $idcon = connexion();
    $requete = $idcon->prepare("
    INSERT INTO `depot` (`id`, `nom`, `ville`, `code_post`, `longit`, `lat`, `directeur`) VALUES (NULL, '?', '?', '?', '?', '?', null);");
    return $requete->execute([ 
      ':nom' => $nom,
      ':ville' => $ville,
      ':code_post ' => $code_post ,
      ':longit' => $longit,
      ':lat' => $lat,
     ':directeur' => $directeur,
    ]);
  }

  public static function suppContact($id)
  {
    $idcon = connexion();
    $requete = $idcon->prepare("
      DELETE  FROM depot where id= :id;
    ");
    return $requete->execute([
      ':id' => $id,
    ]);
  }

  public static function modifContact($id = null, $nom = null, $ville = null, $code_post= null, $longit = null, $lat=null, $directeur=null)
  {
    $idcon = connexion();
    $requet = $idcon->prepare("
    INSERT INTO `depot`(`id`, `nom`, `ville`, `code_post`, `longit`, `lat`, `directeur`) VALUES ('[?]','[?','[?]','[?]','[?]','[?]','[?]')
    ");
    return $requet->execute([
      ':id' => $id,
      ':nom' => $nom,
      ':ville' => $ville,
      ':code_post' => $code_post ,
      ':longit' => $longit,
      ':lat' => $lat,
      ':directeur' =>$directeur,
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

  public function getville()
  {
    return $this->ville;
  }

  public function getcode_post ()
  {
    return $this->code_post ;
  }

  public function getlongit()
  {
    return $this->longit;
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

  public function setville($ville)
  {
    $this->ville = $ville;
    return $this;
  }

  public function setcode_post ($code_post )
  {
    $this->code_post  = $code_post ;
    return $this;
  }

  public function setlongit($longit)
  {
    $this->longit = $longit;
    return $this;
  }
}
