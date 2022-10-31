<?php
require "../../../model/depots/admin/ModelDepot.php ";


class ViewDepot
{
  public  static function listeDepots()
  {
    $liste = ModelDepot::listeDepots();
?>
    <div class="container">
      <?php
      if ($liste) {
      ?>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nom</th>
              <th scope="col">ville</th>
              <th scope="col">code_post </th>
              <th scope="col">longitude</th>
              <th scope="col">latitude</th>
              <th scope="col">directeur</th>

            </tr>
          </thead>
          <tbody>


            <?php


            foreach ($liste  as $colonne => $valeur) {
            ?>
              <tr>
                <th scope="row"><?= $valeur['id'] ?></th>
                <td><?= $valeur['nom'] ?></td>
                <td><?= $valeur['ville'] ?></td>
                <td><?= $valeur['code_post'] ?></td>
                <td><?= $valeur['longit'] ?></td>
                <td><?= $valeur['lat'] ?></td>
                <td><?= $_SESSION['id'] ?></td>

                <td>
                  <a href="voir.php?id=<?= $valeur['id'] ?>" class="btn-sm btn-info text-white">Voir</a>
                  <a href="supp.php?id=<?= $valeur['id'] ?>" class="btn-sm btn-danger">Supprimer</a>
                </td>
              </tr>
            <?php
            }
            ?>


          </tbody>
        </table>
      <?php
      } else {
        echo "aucun Depot n'a été trouvé dans la liste.";
      }
      ?>
    </div>
    <?php
  }

  public static function voirDepot($id)
  {
    $Depot =  ModelDepot::voirDepot($id);
    // j'ai trouvé le Depot
    if ($Depot) {
    ?>
      <div>
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title">Depot : <?= $Depot['id'] . " : " . $Depot['nom'] . " " . $Depot['ville'];  ?> </h5>

            <p class="card-text">
             Login: <?= $Depot['ville'] ?><br>
             Nom: <?= $Depot['nom'] ?>
            </p>
            <a href="modif.php?id=<?= $Depot['id'] ?>" class="btn btn-info">Modifier</a>
            <a href="supp.php?id=<?= $Depot['id'] ?>" class="btn btn-danger">Supprimer</a><br><br>
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
      <h1>aucun Depot trouvé</h1>
    <?php
    }
  }

  public static function modifDepot($id)
  {
    $Depot = ModelDepot::voirDepot($id, $_SESSION['id']);

    ?>
    session-start();
    <?php var_dump($_SESSION); ?>
    <form class="col-md-6 offset-md-3" method="post" action="modif.php">
      <input type="hidden" class="form-control" name="id" id="id" value="<?= $Depot['id'] ?>">
      <div class="form-group">
        <label for="nom">Nom : </label>
        <input type="text" class="form-control" name="nom" id="nom" value="<?= $Depot['nom'] ?>">
      </div>
      <div class="form-group">
        <label for="ville">Ville : </label>
        <input type="text" class="form-control" name="ville" id="ville" value="<?= $Depot['ville'] ?>">
      </div>
      <div class="form-group">
        <label for="code_postal">Code Postal : </label>
        <input type="txt" class="form-control" name="code_post" id="code_post" value="<?= $Depot['code_post'] ?>">
      </div>
      <div class="form-group">
        <label for="longi">longitude : </label>
        <input type="text" class="form-control" name="longi" id="longi" value="<?= $Depot['longit'] ?>">
      </div>
      <div class="form-group">
        <label for="lat">latitude : </label>
        <input type="text" class="form-control" name="lat" id="lat" value="<?= $Depot['lat'] ?>">
      </div>
      <div class="form-group hide ">
        <input type="hidden" class="form-control" name="directeur" id="directeur" value="<?= $_SESSION['id']  ?>">
      </div>
      <button type="submit" class="btn btn-info" name="modif" id="modif">Modifier</button>
      <button type="reset" class="btn btn-danger">Réinitialiser</button>
    </form>

  <?php
  }

  public static function ajoutDepot()
  {

  ?>

    <form class="col-md-6 offset-md-3" method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <div class="form-group">
        <label for="nom">Nom : </label>
        <input type="text" class="form-control" name="nom" id="nom">
      </div>
      <div class="form-group">
        <label for="ville">ville : </label>
        <input type="text" class="form-control" name="ville" id="ville">
      </div>
      <div class="form-group">
        <label for="code_post">code postal : </label>
        <input type="txt" class="form-control" name="code_post " id="code_post">
      </div>
      <div class="form-group">
        <label for="tel">Longitude: </label>
        <input type="txt" class="form-control" name="longit" id="longit">
      </div>
      <div class="form-group">
        <label for="tel">latitude : </label>
        <input type="txt" class="form-control" name="lat" id="lat">
      </div>
      <div class="form-group">
        <input type="hidden" class="form-control" name="directeur" id="directeur" value="<?= $_SESSION['id']; ?>">
      </div>

      <button type="submit" class="btn btn-primary" name="ajout" id="ajout">Ajouter</button>
      <button type="reset" class="btn btn-danger">Réinitialiser</button>
    </form>
<?php
  }
}
