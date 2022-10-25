<?php

class ViewTemplate
{
  public static function menu()
  { ?>

    <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
      <div class="container">
        <a class="navbar-brand" href="liste.php">Clients</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="liste.php">Liste</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="ajout.php">Ajouter</a>
            </li>
            <ol class="breadcrumb">
      <li class="breadcrumb-item"><a  type="button"href="../../controller/deconnexion.php">deconnexion</a></li>
    </ol> -->

          </ul>
        </div>
      </div>
    </nav>
  <?php
  }


  public static function footer()
  { ?>
    <div class="bg-dark py-4 mt-5 text-center text-light h3">
      <div class="container">
        copyright &copy; <?= date("Y") ?>
      </div>
    </div>
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
