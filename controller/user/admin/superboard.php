<?php
session_start();

if (isset($_SESSION['id']) && ($_SESSION['role'] === "superadmin") ) {


?>
<!DOCTYPE html>
<html lang="en">

<body>
  <?php include_once "../../../view/headadmin.php" ?>
  <?php include_once "../../../view/navadmin.php" ?>
  <?php include_once "../../../view/user/admin/ViewTemplate.php" ?>

  <div class="m-2 ">
    <p class="text-center m-1 h1"><u> super admin tableau de bord </u></p>
    <br>
    <p class="text-center m-1 h1">Role hierarchique: <?= $_SESSION['role']?></p>
  </div>
<?php 
include_once "../../../view/user/admin/ViewUser.php";
ViewUser::superboard();

?>
  <?php ViewTemplate::footer();
  ?>
  <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
  <script src="http://cdn.jsdelivr.net/jquery.validation/1.14.0/jquery.validate.min.js"></script>
</body>

</html>

<?php } else {
  var_dump($_SESSION['id']);
  var_dump($_SESSION['role']);
  header('Location: connexion-user.php');
  exit;
}?>