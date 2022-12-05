<?php
session_start();
require_once "../../../model/catproduits/admin/ModelCatProduit.php";
class ViewCatProduit
{
  public  static function listeCatProduit()
  {
    $liste = ModelCatProduit::listeCatProduit();
?>
    <div class="card  my-5 p-3 border-2 border-start border-primary border-top   ">
      <?php
      if ($liste) {
      ?>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">type</th>
              <th scope="col">&nbsp &nbsp Action</th>

            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($liste  as $valeur) {
            ?>
              <tr>
                <th scope="row"><?= $valeur['id'] ?></th>
                <td><?= $valeur['type'] ?></td>

                <td>
                  <a href="voir.php?id=<?= $valeur['id']?>" class="btn btn-primary">Voir</a>
                  <a href="supp.php?id=<?= $valeur['id'] ?>" class="btn btn-danger">Supprimer</a>
                  <a href="modif.php?id=<?= $valeur['id'] ?>" class="btn btn-info">modifier</a>

                </td>
              </tr>
            <?php
            }
            ?>


          </tbody>
        </table>
      <?php
      } else {
        echo "aucun catégorie de Produit n'a été trouvé dans la liste.";
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
      <div class="d-flex ">
        <div class=" card mx-auto m-3 justify-content-center" style="width: 18rem;">
          <div class="d-flex flex-column card-body ">
            <h5 class="card-title"><?= $catProduit['id'] . " : " . $catProduit['type'] . ""  ?> </h5>

            <p class="card-text">
              Type :<?= $catProduit['type'] ?><br>
            </p>
            <a href="<?=ViewCatProduit::modifCatProduit($id)?>" class="btn btn-info mb-1">Modifier</a>
            <a href="supp.php?id=<?= $catProduit['id'] ?>" class="btn btn-danger">Supprimer</a><br>
            <a href="../../controller/catproduits/index.php" class="btn btn-primary">Retour</a>
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

  public static function modifCatProduit($id,$type)
  {
    $catProduit = ModelCatProduit::ModifCatProduit($id,$type);
    ?>
    <div class="text-center h3 P-3">veuillez ajoutez une catégorie de produit </div>
    <div class="m-5">
      <form class="col-md-6 offset-md-3" method="GET" action="modif.php">
        <input type="hidden" class="form-control" name="id" id="id" value="<?= $catProduit['id'] ?>">
        <div class="form-group">
          <label for="nom">Type : </label>
          <input type="text" class="form-control" name="type" id="type" value="<?= $catProduit['type'] ?>">
        </div>
        <button type="submit" class="btn btn-info" name="modif" id="modif">Modifier</button>
        <button type="reset" class="btn btn-danger">Réinitialiser</button>
      </form>
    </div>
  <?php
  }

  public static function ajoutCatProduit()
  { ?>
    <form class="col-md-6 offset-md-3" method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <div class="form-group">
        <input type="hidden" class="form-control" name="id" id="id">
      </div>
      <div class="form-group">
        <label for="prenom">Type : </label>
        <input type="text" class="form-control" name="type" id="type">
      </div>
      <button type="submit" class="btn btn-primary" name="ajout" id="ajout">Ajouter</button>
      <button type="reset" class="btn btn-danger">Réinitialiser</button>
    </form>

<?php
  }
}
