<?php

class ViewUser
{
  public static function ajoutUser()
  {
?>
    <div class="container mt-5">
      <form class="col-md-6 offset-md-3" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data">
        <div class="form-group">
          <label for="login">Email : </label>
          <input type="text" class="form-control" name="login" id="login">
        </div>
        <div class="form-group">
          <label for="pass">Mot de passe : </label>
          <input type="password" class="form-control" name="pass" id="pass">
        </div>
        <div class="form-group">
          <label for="nom">nom : </label>
          <input type="text" class="form-control" name="nom" id="nom">
        </div>
        <div class="form-group">
          <label for="prenom">prenom : </label>
          <input type="text" class="form-control" name="prenom" id="prenom">
        </div>

        <button type="submit" name="ajout" class="btn btn-primary">Ajouter</button>
        <button type="reset" name="annuler" class="btn btn-danger">Annuler</button>
      </form>
    </div>

  
  <?php
  }
 
  public static function connexion()
  {
  ?>
    <div class="container mt-5">
      <form class="col-md-6 offset-md-3" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data">
        <div class="form-group">
          <label for="login">Login : </label>
          <input type="text" class="form-control" name="login" id="login">
        </div>
        <div class="form-group">
          <label for="pass">Mot de passe : </label>
          <input type="password" class="form-control" name="pass" id="pass">
        </div>
        <button type="submit" name="connexion" class="btn btn-primary">Connexion</button>
        <button type="reset" name="annuler" class="btn btn-danger">Annuler</button>
      </form>
    </div>
<?php
  }
}
