<?php


if (isset($_SESSION['id']) && ($_SESSION['role'] === "admin" || $_SESSION['role'] === "directeur" || $_SESSION['role'] === "superadmin" )) {
?>

<div>
<?php
require_once "../../../model/produits/admin/Utils.php";
if (isset($_POST['ajout'])) {


  $extensions = ["jpg", "jpeg", "png", "gif"];
  $upload = Utils::upload($extensions, $_FILES['photo']);

  if ($upload['uploadOk']) {
    echo "<h1>Upload fait avec succes</h1>";
  } else {
    echo
    "<h1>" . $upload['errors'] . "</h1>";
  }
} else {
?>
  <div class="custom-file form-group ms-3  ">
    <input type="file" name="photo" id="photo" class="m-1" value="photo">
      <br><br>
    </div>
<?php
}
}
 else {
  var_dump($_SESSION['id']);
  var_dump($_SESSION['role']);

  header('Location: connexion-user.php');
  exit;
}
?>


