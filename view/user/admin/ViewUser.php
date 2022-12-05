<?php

class ViewUser
{
  public  static function listeUser($liste)
  {
?>

    <?php
    if ($liste) {
    ?>
      <div class="card  d-flex justify-content-center py-2 my-5  my-5 p-3 border-2 border-start border-primary border-top">

        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Nom</th>
              <th scope="col">Prénom</th>
              <!-- <th scope="col">pass</th> -->
              <th scope="col">Login</th>
              <th scope="col">Role</th>
              <th scope="col">Action</th>

            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($liste  as  $valeur) {
            ?>
              <tr>

                <td><?= $valeur['nom'] ?></td>
                <td><?= $valeur['prenom'] ?></td>
                <!-- <td><?= $valeur['pass'] ?></td> -->
                <td><?= $valeur['login'] ?></td>
                <td><?= $valeur['role'] ?></td>
                <td>
                  <a href="voir.php?id=<?= $valeur['id'] ?>" class="btn btn-sm btn-primary">Voir</a>

                  <?php if ($valeur['role'] === 'directeur' || $valeur['role'] === 'superadmin') { ?>
                    <p href="#" class="btn btn-sm">administrateur</p>
                  <?php } elseif ($valeur['role'] === 'user' || $valeur['role'] === 'admin') { ?>
                    <a href="supp.php?id=<?= $valeur['id'] ?>" class="btn btn-sm btn-danger ">Supprimer</a>
                <?php }
                } ?>


                </td>
              </tr>
          </tbody>
        </table>
      </div>
    <?php
    } else {
      echo "aucun utilisateur n'a été trouvé dans la liste.";
    }
    ?>

    <?php
  }

  public static function voirUser($id)
  {
    $ModelUser =  ModelUser::voirUser($id);
    // j'ai trouvé le UserModelUser
    if ($ModelUser) {
    ?>
      <div class="container  d-flex justify-content-center py-2 my-5">
        <div class="card " style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title">
              <?= $ModelUser['id'] . " : " . $ModelUser['nom'] . " " . $ModelUser['prenom']; ?> </h5>

            <p class="card-text">
              Login : <?= $ModelUser['login'] ?><br>
              Nom : <?= $ModelUser['nom'] ?>
            </p>
            <a href="modif.php?id=<?= $ModelUser['id'] ?>" class="btn btn-info">Modifier</a>
            <a href="supp.php?id=<?= $ModelUser['id'] ?>" class="btn btn-danger">Supprimer</a><br><br>
            <a href="liste.php" class="btn btn-primary">
              < Retour</a>
          </div>
        </div>
      </div>

    <?php
    }
    // je l'ai pas trouvé
    else {
    ?>
      <h1>aucun UserModelUser trouvé</h1>
    <?php
    }
  }

  public static function ModifUser($id)
  {
    $UserModelUser = ModelUser::voirUser($id);
    ?>
    <div class="py-2 my-5">
      <form class="col-md-6 offset-md-3" method="post" action="modif.php">
        <input type="hidden" class="form-control" name="id" id="id" value="<?= $UserModelUser['id'] ?>">
        <div class="form-group">
          <label for="nom">Nom : </label>
          <input type="text" class="form-control" name="nom" id="nom" value="<?= $UserModelUser['nom'] ?>">
        </div>
        <div class="form-group">
          <label for="prenom">Prénom : </label>
          <input type="txt" class="form-control" name="prenom" id="prenom" value="<?= $UserModelUser['prenom'] ?>">
        </div>
        <div class="form-group">
          <label for="mail">Login : </label>
          <input type="text" class="form-control" name="login" id="login" value="<?= $UserModelUser['login'] ?>">
        </div>
        <div class="form-group">

          <input type="hidden" class="form-control" name="pass" id="pass" value="<?= $UserModelUser['pass'] ?>">
        </div>
        <div class="form-group">

          <input type="hidden" class="form-control" name="role" id="role" value="<?= $UserModelUser['role'] ?>">
        </div>
        <button type="submit" class="btn btn-info hide" name="modif" id="modif">Modifier</button>
        <button type="reset" class="btn btn-danger">Réinitialiser</button>
      </form>
    </div>
  <?php
  }

  public static function ajoutUser()

  { ?>
    <div class="container justify-content-center py-2 my-5">
      <div class="card ">
        <div class="card-body">
          <h2 class="card-titlet text-center"> ajout d'utilisateur </h2>
          <form class="col-md-6 offset-md-3" method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">

              <div class="form-group">
                <label for="prenom">nom : </label>
                <input type="text" class="form-control" name="nom" id="nom">
              </div>
              <div class="form-group">
                <label for="mail">Prenom : </label>
                <input type="text" class="form-control" name="prenom" id="prenom">
              </div>
              <div class="form-group">
                <label for="tel">login : </label>
                <input type="text" class="form-control" name="login" id="login">
              </div>
              <div class="form-group">
                <label for="tel">Password : </label>
                <input type="password" class="form-control" name="pass" id="pass">
              </div>
              <div class="form-group">
                <?php if (isset($_SESSION['id']) && ($_SESSION['role'] === "directeur" || $_SESSION['role'] === "directeur")) { ?>
                  <select name="role" id="role" class=" m-3">
                    <option value="#"> --role shouaitez-- </option>
                    <option value="admin"> admin </option>
                    <option value="user">user</option>
                  </select>

                <?php } elseif (isset($_SESSION['id']) && ($_SESSION['role'] === "superadmin")) { ?>
                  <select name="role" id="role" class=" m-3">
                    <option value="#"> --role shouaitez-- </option>
                    <option value="admin"> admin </option>
                    <option value="user">user</option>
                    <option value="directeur">directeur</option>
                  </select>

                <?php } ?>
              </div>
              <button type="submit" class="btn btn-primary" name="ajout" id="ajout">Ajouter</button>
              <button type="reset" class="btn btn-danger">Réinitialiser</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  <?php
  }

  public static function connexion()
  {
  ?>
    <div class="  p-2  border rounded border-dark py-2 my-5 ">
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
  public static function superboard()
  {
  ?>
    <div class=" container card my-2">
      <div class="d-flex justify-content-around border border-primary rounded-3 mx-auto my-2 bg-dark bg-opacity-50 " style="width :800px ; height : 300px ">
        <div class=" border border-primary p-2 m-2" >
          <p>information sur les dépots</p>
        </div>
        <div class=" border border-primary p-2 m-2" >
          <p>liste des depots</p>
        </div>
        <div class=" border border-primary p-2 m-2" >
          <p>divers</p>
        </div>

      </div>
    </div>
<?php
  }
}
?>