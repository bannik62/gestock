
<?php
require_once "connexion.php";

class ModelDepot
{
  // une class possede un modele avec des parametre manipulable
  private $id;
  private $nom;
  private $ville;
  private $code_post;
  private $longi;
  private $lat;
  private $directeur;

  public function __construct($id = null, $nom = null, $ville = null, $code_post = null, $longi = null, $lat = null, $directeur = null)
  {
    // manipulation des parametres ajouts des valeurs
    $this->id =        $id;
    $this->nom =       $nom;
    $this->ville =     $ville;
    $this->code_post = $code_post;
    $this->longi =     $longi;
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

  public static function ajoutDepot($nom, $ville, $code_post, $longi, $lat, $directeur)
  {
    $idcon = connexion();
    $requete = $idcon->prepare("
    INSERT INTO depot VALUES (null, :nom,:ville,:code_post,:longi,:lat,:directeur)");
    return $requete->execute([

      ':nom' => $nom,
      ':ville' => $ville,
      ':code_post' => $code_post,
      ':longi' => $longi,
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

  public static function modifDepot($id = null, $nom = null, $ville = null, $code_post = null, $longi = null, $lat = null, $directeur = null)
  {
    $idcon = connexion();
    $requete = $idcon->prepare("
    UPDATE depot SET id=:id ,nom=:nom, ville=:ville, code_post=:code_post, longi=:longi ,lat=:lat, directeur=:directeur WHERE id = :id

    ");
    return $requete->execute([
      ':id' => $id,
      ':nom' => $nom,
      ':ville' => $ville,
      ':code_post' => $code_post,
      ':longit' => $longi,
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
    return $this->longi;
  }

  public  function getlat()
  {
    $this->$lat;
    return $this;
  }

  public function setDirecteur()
  {
    $this->$directeur;
    return $this;
  }
}
