<?php
// require_once "connexion.php";

class ModelTypeProd
{
  // une class possede un modele avec des parametre manipulable
  private $id;
  private $type;

  public function __construct($id = null, $type = null)
  {
    // manipulation des parametres ajouts des valeurs

    $this->id = $id;
    $this->type = $type;
  }


  public static function listeTypeProduit()
  {
    $idcon = connexion();

    $requete = $idcon->prepare("
      SELECT * FROM type_pdt
    ");
    $requete->execute();
    return $requete->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getId()
  {
    return $this->id;
  }

  public function getType()
  {
    return  $this->type;
  }
}
