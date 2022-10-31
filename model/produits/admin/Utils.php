<?php

class Utils
{

  public static function upload($extensions, $fichier)
  {

    $file_name = $fichier['name']; // nom sur le poste client
    $file_size = $fichier['size']; // taille
    $file_tmp = $fichier['tmp_name']; // fichier dans la memoire tampon
    $file_ext = strtolower(pathinfo($fichier['name'], PATHINFO_EXTENSION)); // extension

    $uploadOk = false; // par defaut false avant que je fasse les controles
    $errors = ""; // chaine contient les messages d'erreurs s'il y en a

    // ctrl sur le nom ==> regex (pas de caract speciaux)
    // ctrl sur les extensions autorisees
    // ctrl sur la taille
    // ne pas ecraser un fichier existant

    $pattern = "/^[\p{L}\w\s\-\.]{3,}$/";
    if (!preg_match($pattern, $file_name)) {
      $errors .= "Nom de fichier non valide. <br/>";
    }

    if (!in_array($file_ext, $extensions)) {
      $errors .= "extension non autorisée. <br/>";
    }

    if ($file_size > 3000000) {
      $errors .= "taille du fichier ne doit pas dépasser 3 Mo. <br/>";
    }

    $file_name = substr(    md5($fichier['name']) , 10) . ".$file_ext";

    while (file_exists("images/$file_name")) {
      $file_name = substr(md5($file_name), 10) . ".$file_ext";
    }

    if ($errors === "") {
      if (move_uploaded_file($file_tmp,  "images/" . $file_name)) {
        $uploadOk = true;
      } else {
        $errors .= "Echec de l'upload. <br/>";
      }
    }
    return ["uploadOk" => $uploadOk, "file_name" => $file_name, "errors" => $errors];

  }
}
