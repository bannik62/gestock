<?php
session_start();
?>
<!doctype html>
<html lang="fr">
<?php 
require_once "../../../view/headadmin.php";
require_once "../../../view/navuser.php"
?>

<?php
require_once "../../../view/depots/admin/ViewDepot.php";
require_once "../../../view/depots/admin/ViewTemplate.php";

require_once "ajout.php";
ViewDepot::listeDepots();
 
?>
</html>