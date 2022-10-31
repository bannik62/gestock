
<?php
require_once "connexion.php";

class ModelDepot
{
  // une class possede un modele avec des parametre manipulable
  private $id;
  private $nom;
  private $ville;
  private $code_post;
  private $longit;
  private $lat;
  private $directeur;

  public function __construct($id = null, $nom = null, $ville = null, $code_post = null, $longit = null, $lat = null, $directeur = null)
  {
    // manipulation des parametres ajouts des valeurs
    $this->id =        $id;
    $this->nom =       $nom;
    $this->ville =     $ville;
    $this->code_post = $code_post;
    $this->longit =    $longit;
    $this->lat =       $lat;
    $this->directeur = $directeur;
  }

  public static function listeDepots()
  {
    $idcon = connexion();

    $requete = $idcon->prepare("
      SELECT * FROM depot
    ");
    $requete->execute();
    return $requete->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function voirDepot($id)
  {
    $idcon = connexion();
    $requete = $idcon->prepare("
      SELECT * FROM depot where id=:id;
    ");
    $requete->execute([
      ':id' => $id,
    ]);
    return $requete->fetch(PDO::FETCH_ASSOC);
  }

  public static function ajoutDepot($id, $nom, $ville, $code_post, $longit, $lat, $directeur)
  {
    $idcon = connexion();
    $requete = $idcon->prepare("
    INSERT INTO `depot`(`id`, `nom`, `ville`, `code_post`, `longit`, `lat`, `directeur`) VALUES ('[$id]','[$nom]','[$ville]','[$code_post]','[$longit]','[$lat]','$directeur]')");
    return $requete->execute([
      ':id' => $id,
      ':nom' => $nom,
      ':ville' => $ville,
      ':code_post' => $code_post,
      ':longit' => $longit,
      ':lat' => $lat,
      ':directeur' => $directeur
    ]);
  }

  public static function suppDepot($id)
  {
    $idcon = connexion();
    $requete = $idcon->prepare("
      DELETE  FROM depot where id= :id;
    ");
    return $requete->execute([
      ':id' => $id,
    ]);
  }

  public static function modifDepot($id = null, $nom = null, $ville = null, $code_post = null, $longit = null, $lat = null, $directeur = null)
  {
    $idcon = connexion();
    $requet = $idcon->prepare("
    UPDATE depot SET id=:id ,nom=:nom, ville=:ville, code_post=:code_post, longit=:longit ,lat=:lat, directeur=:directeur WHERE id = :id

    ");
    return $requet->execute([
      ':id' => $id,
      ':nom' => $nom,
      ':ville' => $ville,
      ':code_post' => $code_post,
      ':longit' => $longit,
      ':lat' => $lat,
      ':directeur' => $directeur,
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

  public function getcode_post()
  {
    return $this->code_post;
  }

  public function getlongit()
  {
    return $this->longit;
  }

  public function getlat($lat)
  {
    $this->$lat;
    return $this;
  }

  public function setNom($description)
  {
    $this->$description;
    return $this;
  }
}
