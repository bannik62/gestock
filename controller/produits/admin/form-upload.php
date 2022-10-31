<!DOCTYPE html>
<html lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php
require_once "../../../model/produits/admin/Utils.php";


if (isset($_POST['valider'])) {
  $extensions = ["jpg", "jpeg", "png", "gif"];
  $upload = Utils::upload($extensions, $_FILES['photo']);
   var_dump($upload);
  if ($upload['uploadOk']) {
    echo "<h1>Upload fait avec succes</h1>";
  } else {
    echo
    "<h1>" . $upload['errors'] . "</h1>";
  }
} else {
?>


    <div class="custom-file form-group" >
      <input type="file" name="photo" id="photo" class="m-1" value="<?= $Produit['photo']?>">
      <br><br>
    </div>

   

<?php
}
