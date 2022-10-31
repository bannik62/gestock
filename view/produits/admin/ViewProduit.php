<?php
require_once "../../../model/produits/admin/ModelProduits.php";

class ViewProduit
{
  public  static function listeProduit()
  {
    $liste = ModelProduit::listeProduit();
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
              <th scope="col">Type</th>
              <th scope="col">Photo</th>
              <th scope="col">description</th>
            </tr>
          </thead>
          <tbody>


            <?php


            foreach ($liste  as $colonne => $valeur) {
            ?>
              <tr>
                <th scope="row"><?= $valeur['id'] ?></th>
                <td><?= $valeur['nom'] ?></td>
                <td><?= $valeur['type'] ?></td>
                <td><?= $valeur['photo'] ?></td>
                <td><?= $valeur['description'] ?></td>
                <td>
                  <a href="modif.php?id=<?= $valeur['id'] ?>" class="btn btn-info text-white">Modifier</a>
                  <a href="supp.php?id=<?= $valeur['id'] ?>" class="btn btn-danger">Supprimer</a>
                </td>
              </tr>
            <?php
            }
            ?>


          </tbody>
        </table>
      <?php
      } else {
        echo "aucun Produit n'a été trouvé dans la liste.";
      }
      ?>
    </div>
    <?php
  }

  public static function voirProduit($id)
  {
    $Produit =  ModelProduit::voirProduit($id);
    // j'ai trouvé le Produit
    if ($Produit) {
    ?>
      <div>
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title"><?= $Produit['id'] . " : " . $Produit['nom'] . " " . $Produit['type'];  ?> </h5>

            <p class="card-text">
              photo : <a href="photo:<?= $Produit['photo'] ?>" target="_blank"><?= $Produit['photo'] ?></a><br>
              description : <a href="description:<?= $Produit['description'] ?>" target="_blank"><?= $Produit['description'] ?></a>
            </p>
            <a href="modif.php?id=<?= $Produit['id'] ?>" class="btn btn-info">Modifier</a>
            <a href="supp.php?id=<?= $Produit['id'] ?>" class="btn btn-danger">Supprimer</a><br><br>
            <a href="liste.php" class="btn btn-primary">
              Retour</a>
          </div>
        </div>
      </div>

    <?php
    }
    // je l'ai pas trouvé
    else {
    ?>
      <h1>aucun Produit trouvé</h1>
    <?php
    }
  }

  public static function modifProduit($id)
  {
    $Produit = ModelProduit::voirProduit($id);
    ?>
    <form class="col-md-6 offset-md-3" method="post" action="modif.php" >
      <input type="hidden" class="form-control" name="id" id="id" value="<?= $Produit['id'] ?>">
      <div class="form-group">
        <label for="nom">Nom : </label>
        <input type="text" class="form-control" name="nom" id="nom" value="<?= $Produit['nom'] ?>">
      </div>

      <select name="type" id="type" class=" m-3">
        <option value="#"> --type produit-- </option>
        <option value="1">jeux video</option>
        <option value="2">hi-fi</option>
      </select>

      <!-- <div class="form-group">
        <label for="photo"> photo : </label>
        <input type="" class="form-control" name="photo" id="photo" value="">
      </div> -->
      <?php require_once "form-upload.php" ?>
<form action="" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="description">Déscription : </label>
        <input type="description" class="form-control" name="description" id="description" value="<?= $Produit['description'] ?>">
      </div>
</form>

      <button type="submit" class="btn btn-info" name="modif" id="modif">Modifier</button>
      <button type="reset" class="btn btn-danger">Réinitialiser</button>
    </form>

  <?php
  }

  public static function ajoutProduit()
  { ?>
    <form class="col-md-6 offset-md-3" method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <div class="form-group">
        <label for="nom">Nom : </label>
        <input type="text" class="form-control" name="nom" id="nom">
      </div>
      <div>
        <select name="type" id="type" class=" m-3">
          <option value="#"> --type produit-- </option>
          <option value="1">jeux video</option>
          <option value="2">hi-fi</option>
        </select>
      </div>
      <div>
        <?php require_once "../../controller/produits/form-upload.php" ?>
      </div>
      <div class="form-group">
        <label for="description">description: </label>
        <input type="description" class="form-control" name="description" id="description">
      </div>

      <button type="submit" class="btn btn-primary" name="ajout" id="ajout">Ajouter</button>
      <button type="reset" class="btn btn-danger">Réinitialiser</button>
    </form>

<?php
  }
}
