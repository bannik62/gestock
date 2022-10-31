
<?php
session_start();
require_once "../../../model/catproduits/ModelCatProduit.php";
class ViewCatProduit 
{
  public  static function listeCatProduit()
  {
    $liste = ModelCatProduit::listeCatProduit();
?>
    <div class="container ">
      <?php
      if ($liste) {
      ?>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Id</th>
              <th scope="col">type</th>
         
            </tr>
          </thead>
          <tbody>


            <?php


            foreach ($liste  as $colonne => $valeur) {
            ?>
              <tr>
                <th scope="row"><?= $valeur['id'] ?></th>
                <td><?= $valeur['type'] ?></td>

              </tr>
            <?php
            }
            ?>


          </tbody>
        </table>
      <?php
      } else {
        echo "aucun catProduit n'a été trouvé dans la liste.";
      }
      ?>
    </div>
    <?php
  }

  public static function voirCatProduit($id)
  {
    $catProduit =  ModelCatProduit::voirCatProduit($id);
    // j'ai trouvé le catProduit
    if ($catProduit) {
    ?>
      <div>
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title"><?= $catProduit['id'] . " : " . $catProduit['type'] . ""  ?> </h5>

            <p class="card-text">
              Type :<?= $catProduit['type'] ?><br>
            </p>
            <a href="modif.php?id=<?= $catProduit['id'] ?>" class="btn btn-info">Modifier</a>
            <a href="supp.php?id=<?= $catProduit['id'] ?>" class="btn btn-danger">Supprimer</a><br><br>
            <a href="../../controller/catproduits/index.php" class="btn btn-primary">
              < Retour</a>
          </div>
        </div>
      </div>

    <?php
    }
    // je l'ai pas trouvé
    else {
    ?>
      <h1>aucun catProduit trouvé</h1>
    <?php
    }
  }

  public static function modifCatProduit($id)
  {
    $catProduit = ModelCatProduit::voirCatProduit($id);
    ?>
    <form class="col-md-6 offset-md-3" method="post" action="modif.php">
      <input type="hidden" class="form-control" name="id" id="id" value="<?= $catProduit['id'] ?>">
      <div class="form-group">
        <label for="nom">Type : </label>
        <input type="text" class="form-control" name="nom" id="nom" value="<?= $catProduit['type'] ?>">
      </div>
      <button type="submit" class="btn btn-info" name="modif" id="modif">Modifier</button>
      <button type="reset" class="btn btn-danger">Réinitialiser</button>
    </form>

  <?php
  }

  public static function ajoutCatProduit()
  { ?>
    <form class="col-md-6 offset-md-3" method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <div class="form-group">
        <label for="nom">Nom : </label>
        <input type="text" class="form-control" name="nom" id="nom">
      </div>
      <div class="form-group">
        <label for="prenom">Prenom : </label>
        <input type="text" class="form-control" name="prenom" id="prenom">
      </div>
      <div class="form-group">
        <label for="mail">Adresse mail : </label>
        <input type="email" class="form-control" name="mail" id="mail">
      </div>
      <div class="form-group">
        <label for="tel">téléphone : </label>
        <input type="tel" class="form-control" name="tel" id="tel">
      </div>

      <button type="submit" class="btn btn-primary" name="ajout" id="ajout">Ajouter</button>
      <button type="reset" class="btn btn-danger">Réinitialiser</button>
    </form>

<?php
  }
}
