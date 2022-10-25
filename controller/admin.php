<?php
session_start();

if (isset($_SESSION['id']) && $_SESSION['role'] === "admin") {
  $html = '<h1 class="text-center" ><u>interface administrateur</u></h1>';
  $html .= '<h2 class="text-center" > Bonjour ' . $_SESSION['prenom'] . " " . $_SESSION['nom'] . "<h2>";
} else {
  header('Location: connexion-user.php');
  exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<?php include_once "../view/headadmin.php" ?>
<?php include_once "../view/navadmin.php" ?>

<?php
echo $html;
?>


 <p class="text-center m-3">Application de Gestion des Stocks et Clients </p>
    
 <div class="container d-flex  justify-content-around  align-content-center flex-wrap mt-1">
    
       <div class="afficheinscris affiche text-center overflow-auto " id="afficheinscris" name="afficheinscris" >
      <p class="">ajouter des utilisateurs</p>
      <?php include_once "../controller/inscription.php" ?>
      </div>
 

   
    </div>
 
 
  </div>
  <?php include_once "../view/footer.php" ?>

 
