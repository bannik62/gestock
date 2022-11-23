<?php


class ViewTemplate
{
  public static function menu()
  { ?>
   <nav class="navbar navbar-expand-lg navbar-dark bg-primary">  
    <a class="navbar-brand ms-1" href="#">StockOption  <i class="fa-solid fa-boxes-stacked"></i></a>


<div class="collapse navbar-collapse ms-5" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
    <a href="/controller/user/admin/admin.php" class="btn btn-secondary ">interface utilisateur</a>
</li>


</div>
</nav>
  <?php
  }

  public static function footer()
  { ?>
    <footer>
      <div class="bg-primary py-4 m-0 mt-5 text-center text-light h3">
        <div class="container">
          Gestock copyright &copy; <?= date("Y") ?>
        </div>
             <div>
          <p> Utilisateur : </p><?php echo  $_SESSION['prenom'] ." ". $_SESSION['nom']; ?>
        </div>
      </div> 

    </footer>
    <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
  <script src="http://cdn.jsdelivr.net/jquery.validation/1.14.0/jquery.validate.min.js"></script>
  <?php
  }

  public static function alert($type, $message, $lien = null)
  {
  ?>
    <div class="container alert alert-<?= $type; ?>" role="alert">
      <?= $message . "<br />";
      if ($lien) {
        echo "<a href='$lien' class='alert-link'>Cliquez ici</a>. Pour continuer la navigation.";
      }
      ?>
    </div>
<?php
  }
}
