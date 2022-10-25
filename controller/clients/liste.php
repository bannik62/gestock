<!doctype html>


<?php
require_once "../../view/navabar.php";
require_once "../../view/head.php";

?>
<?php
require_once "../../view/clients/ViewContact.php";
require_once "../../view/clients/ViewTemplate.php";
ViewTemplate::menu();
ViewContact::listeContacts();
ViewContact::ajoutContact();

?>