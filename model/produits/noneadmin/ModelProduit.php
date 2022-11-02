
<?php
require_once "connexion.php";

class ModelProduit
{
  // une class possede un modele avec des parametre manipulable
  private $id;
  private $nom;
  private $type;
  private $photo;
  private $description;


  public function __construct($id = null, $nom = null, $type = null, $photo = null, $description = null, $lat = null, $directeur = null)
  {
    // manipulation des parametres ajouts des valeurs
    $this->id =        $id;
    $this->nom =       $nom;
    $this->type =      $type;
    $this->photo =     $photo;
    $this->description=$description;
 
  }

  public static function listeProduit()
  {
    $idcon = connexion();

    $requete = $idcon->prepare("
      SELECT * FROM pdt
    ");
    $requete->execute();
    return $requete->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function voirProduit($id)
  {
    $idcon = connexion();
    $requete = $idcon->prepare("
      SELECT * FROM pdt where id=:id;
    ");
    $requete->execute([
      ':id' => $id,
    ]);
    return $requete->fetch(PDO::FETCH_ASSOC);
  }

  public static function ajoutProduit($id, $nom, $type, $photo, $description)
  {
    $idcon = connexion();
    $requete = $idcon->prepare("
    INSERT INTO `pdt`(?, `nom`, `type`, `photo`, `description`, `lat`) VALUES ('[$id]','[$nom]','[$type]','[$photo]','[$description]')");
    return $requete->execute([
     
      ':nom' => $nom,
      ':type' => $type,
      ':photo' => $photo,
      ':description' => $description,
  
    ]);
  }

  public static function suppProduit($id)
  {
    $idcon = connexion();
    $requete = $idcon->prepare("
      DELETE  FROM pdt where id= :id;
    ");
    return $requete->execute([
      ':id' => $id,
    ]);
  }

  public static function modifproduit($id = null, $nom = null, $type = null, $photo = null, $description = null, $lat = null, $directeur = null)
  {
    $idcon = connexion();
    $requet = $idcon->prepare("
    UPDATE pdt SET id=:id ,nom=:nom, type=:type, photo=:photo, description=:description ,lat=:lat, directeur=:directeur WHERE id = :id

    ");
    return $requet->execute([
      ':id' => $id,
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

  public function gettype()
  {
    return $this->type;
  }

  public function getphoto()
  {
    return $this->photo;
  }

  public function getdescription()
  {
    return $this->description;
  }

}
