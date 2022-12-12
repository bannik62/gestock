<?php
require_once "../../../model/produits/admin/ModelProduit.php";


class ViewProduit
{
  public  static function listeProduit()
  {
    $liste = ModelProduit::listeProduit();
?>

    <div class="card mx-auto mt-5  my-5 p-3 border-2 border-start border-primary border-top" style="width:70%;">
      <?php
      if ($liste) {
      ?>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Nom</th>
              <th scope="col">description</th>
            </tr>
          </thead>
          <tbody>


            <?php


            foreach ($liste  as  $valeur) {
            ?>
              <tr>
                <!-- <th scope="row"><?= $valeur['id'] ?></th> -->
                <td><?= $valeur['nom'] ?></td>
                <td><?= $valeur['description'] ?></td>
                <td>
                  <a href="supp.php?id=<?= $valeur['id'] ?>" class="btn btn-danger">Supprimer</a>
                  <a href="voir.php?id=<?= $valeur['id'] ?>" class="btn btn-info">Voir</a>

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
      <div class="container  d-flex justify-content-center py-2 my-5">
        <div class="card " style="width: 40%;">
          <div class="card-body">
            <h5 class="card-title">
              <h5 class="card-title"><?= $Produit['nom'] ?> </h5>
              <br>
              <img src="/img/<?= $Produit['photo'] ?>" alt="photo du roduit" style="width:160px">
              <p class="card-text">
                <!-- photo : <a href="/img/<?= $Produit['photo'] ?>">image</a><br> -->
              <p>description : <?= $Produit['description'] ?> </p>
              </p>
              <a href="modif.php?id=<?= $Produit['id'] ?>" class="btn btn-info">Modifier</a>
              <a href="supp.php?id=<?= $Produit['id'] ?>" class="btn btn-danger">Supprimer</a><br><br>
              <a href="index.php" class="btn btn-primary">
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
      <div class="card mx-auto m-2" style="width:450px;">
        <form class="col-6 offset-3 " method="POST" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" ?>">
          <input type="hidden" class="form-control" name="id" id="id" value="<?= $Produit['id'] ?>">

          <div class="form-group">
            <label for="nom">Nom : </label>
            <input type="text" class="form-control" name="nom" id="nom" value="<?= $Produit['nom'] ?>">
          </div>

          <div>
            <select name="type" id="type" class=" m-3">
              <option value="#"> --type produit-- </option>
              <?php
              require_once "../../../model/typeproduits/admin/ModelTypeProd.php";
              $listeType = ModelTypeProd::listeTypeProduit();
              foreach ($listeType  as  $valeur) { ?>
                <option> <?= $valeur['type'] ?> </option>
              <?php } ?>
            </select>
          </div>

          <div>
            <?php require_once "form-upload.php" ?>
          </div>

            <div class="form-group">
              <label for="description">Déscription : </label>
              <input type="description" class="form-control" name="description" id="description" value="<?= $Produit['description'] ?>">
            </div>
        
          <button type="submit" class="btn btn-info" name="modif" id="modif">Modifier</button>
          <button type="reset" class="btn btn-danger">Reset</button>

        </form>
      </div>
    
    
  <?php
  }

  public static function ajoutProduit()
  { ?>
    <div class="card d-flex mx-auto my-4 " style="width: 500px;">
      <form class=" p-1" method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
        <div class="form-group">
          <label for="nom">Nom : </label>
          <input type="text" class="form-control" name="nom" id="nom">
        </div>
        <div>
          <select name="type" id="type" class="m-3">
            <option value="#"> --type produits-- </option>

            <?php
            require_once "../../../model/typeproduits/admin/ModelTypeProd.php";
            $listeType = ModelTypeProd::listeTypeProduit();
            foreach ($listeType  as  $valeur) {
            ?>
              <option value="<?= $valeur['id'] ?>"> <?= $valeur['type'] ?> </option>
            <?php } ?>
          </select>
        </div>

        <div>
          <?php require_once "../../../controller/produits/admin/form-upload.php" ?>
        </div>
        <div class="form-group mb-2">
          <label for="description">description: </label>
          <input type="text" class="form-control" name="description" id="description">
        </div>


        <button type="submit" class="btn btn-primary" name="ajout" id="ajout">Ajouter</button>
        <button type="reset" class="btn btn-danger">Réinitialiser</button>

        <div>
          <select name="type1" id="type1" class="m-3">
            <option value="#"> --depots-- </option>

            <?php
            require_once "../../../model/depots/admin/ModelDepot.php";
            $listeDepot = ModelDepot::listeDepotsProduit($id_depot);
            foreach ($listeDepot  as  $valeur) {
              var_dump($valeur['id']);
            ?>
              <option value="<?= $valeur[$id_depot] ?>"> <?= $valeur['nom'] ?> </option>
            <?php  } ?>
          </select>
        </div>

      </form>
    </div>
  <?php
  }

  public static function stockDepot($id)
  {
    $Depot = ModelDepot::modifDepot($id, $_SESSION['id']);

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
}
