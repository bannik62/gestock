<?php
require_once "connexion.php";

class ModelCatProduit
{
  private $id;
  private $type;


  public function __construct($id, $type = null)
  {
    $this->id = $id;
    $this->nom = $type;

  }

  public static function listeCatProduit()
  {
    $idcon = connexion();
    $requete = $idcon->prepare("
      SELECT * FROM type_pdt
    ");
    $requete->execute();
    return $requete->fetchAll(PDO::FETCH_ASSOC);
  }

  public static function voirCatProduit($id){
    $idcon = connexion();
    $requete = $idcon->prepare("
      SELECT * FROM type_pdt where id=:id;
    ");
    $requete->execute([
      ':id' => $id,
    ]);
    return $requete->fetch(PDO::FETCH_ASSOC);

  }

  public static function ajoutCatProduit( $id,$type)
  {
    $idcon = connexion();
    $requete = $idcon->prepare("
      INSERT INTO type_pdt VALUES (?, :type )
    ");
    return $requete->execute([
      ':id' => $id,
      ':nom' => $type,
  
    ]);
  }

  public static function suppCatProduit($id)
  {
    $idcon = connexion();
    $requete = $idcon->prepare("
      DELETE  FROM type_pdt where id= :id;
    ");
    return $requete->execute([
      ':id' => $id,
    ]);
  }

  public static function modifCatProduit($id)
  {
    $idcon = connexion();
    $requet = $idcon->prepare("
      UPDATE type_pdt SET  type = :type WHERE id = :id
    ");
    return $requet->execute([
      ':id' => $id,
      ':nom' => $type,
    ]);
  }

  /*
  
  GETTERS ET SETTERS

  */

  public function getId()
  {
    return $this->id;
  }

  public function getType()
  {
    return $this->type;
  }

}
