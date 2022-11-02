<?php

class ViewTemplate
{
  public static function menu()
  { ?>
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">  <a class="navbar-brand" href="#">StockOption</a>


<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
    <a href="/controller/user/admin/admin.php" class="btn btn-info ">interface user</a>
</li>


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
