<!doctype html>
<html lang="fr">
<?php
require_once "../../view/navabar.php";
require_once "../../view/head.php";

?>



<?php
require_once "../../view/depots/ViewContact.php";
require_once "../../view/depots/ViewTemplate.php";


ViewContact::listeContacts();
ViewContact::ajoutContact();
?>
</html>