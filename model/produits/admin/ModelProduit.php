
<?php
require_once "connexion.php";

class ModelProduit
{
  // une class possede un modele avec des parametre manipulable

  public function __construct($id = null, $nom = null, $type = null, $photo = null, $description = null)
  {
    // manipulation des parametres ajouts des valeurs
 
    $this->id =          $id;
    $this->nom =         $nom;
    $this->type =        $type;
    $this->photo =       $photo;
    $this->description = $description;
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
    $requete = $idcon->prepare("SELECT * FROM pdt where id=:id;");
    $requete->execute([
      ':id' => $id,
    ]);
    return $requete->fetch(PDO::FETCH_ASSOC);
  }

  public static function ajoutProduit($nom, $type,$photo, $description)
  {
    $idcon = connexion();
    $requete = $idcon->prepare("INSERT INTO pdt VALUES (null, :nom, :type, :photo, :description)");
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

  public static function modifproduit($id , $nom , $type , $photo , $description )
  {
    $idcon = connexion();
    $requet = $idcon->prepare("UPDATE pdt SET nom=:nom, type=:type, photo=:photo, description=:description WHERE id = :id");
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


}
