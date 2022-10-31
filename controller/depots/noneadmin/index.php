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
require_once "../../../view/depots/noneadmin/ViewDepot.php";
require_once "../../../view/depots/noneadmin/ViewTemplate.php";

ViewDepot::listeDepots();
 
?>
</html>