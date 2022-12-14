<?php

class ViewTemplate
{
  public static function menu()
  { ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary d-flex">
      <a class="navbar-brand ms-1  href=" #">StockOption <i class="fa-solid fa-boxes-stacked"></i></a>


      <div class="collapse navbar-collapse ms-5" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a href="admin.php" class="btn btn-secondary ">interface utilisateur</a>
          </li>
      </div>
    </nav>
  <?php
  }

  public static function footer()
  { ?>

    <footer>
      <div class="bg-primary py-1 m-0 text-center text-light h3">
        <div class="container">
          Gestock copyright &copy; <?= date("Y") ?>
        </div>
        <div>
          <p> Utilisateur : <?php echo  $_SESSION['prenom'] . " " . $_SESSION['nom']; ?></p>
        </div>
      </div>

    </footer>
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
