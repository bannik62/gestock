<!doctype html>
<html lang="fr">
<?php require_once "../../../view/headadmin.php"; ?>
<body>
  <?php require_once "../../../view/navuser.php"; ?>
  <div class="container list " style="width:100% ;" >

    <?php
    require_once "../../../view/user/noneadmin/ViewUser.php";
    require_once "../../../view/user/noneadmin/ViewTemplate.php";
    require_once "../../../model/user/noneadmin/ModelUser.php";

    $liste = ModelUser::listeUser();
    ViewUser::listeUser($liste);

    ?>
  </div>
</body>

</html>