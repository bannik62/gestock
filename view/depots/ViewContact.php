<?php
require "../../model/depots/ModelContact.php";


class ViewContact
{
  public  static function listeContacts()
  {
    $liste = ModelContact::listeContacts();
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
                <td><?= $valeur['directeur'] ?></td>

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
        echo "aucun contact n'a été trouvé dans la liste.";
      }
      ?>
    </div>
    <a class="btn btn-info ms-5" href="javascript:history.go(-1)">Retour interface admin</a>

    <?php
  }

  public static function voirContact($id)
  {
    $contact =  ModelContact::voirContact($id);
    // j'ai trouvé le contact
    if ($contact) {
    ?>
      <div>
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title"><?= $contact['id'] . " : " . $contact['nom'] . " " . $contact['ville'];  ?> </h5>

            <p class="card-text">
              Mail : <a href="mailto:<?= $contact['mail'] ?>" target="_blank"><?= $contact['mail'] ?></a><br>
              Tel : <a href="tel:<?= $contact['tel'] ?>" target="_blank"><?= $contact['tel'] ?></a>
            </p>
            <a href="modif.php?id=<?= $contact['id'] ?>" class="btn btn-info">Modifier</a>
            <a href="supp.php?id=<?= $contact['id'] ?>" class="btn btn-danger">Supprimer</a><br><br>
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
      <h1>aucun contact trouvé</h1>
    <?php
    }
  }

  public static function modifContact($id)
  {
    $contact = ModelContact::voirContact($id);
    ?>
    <form class="col-md-6 offset-md-3" method="post" action="modif.php">
      <input type="hidden" class="form-control" name="id" id="id" value="<?= $contact['id'] ?>">
      <div class="form-group">
        <label for="nom">Nom : </label>
        <input type="text" class="form-control" name="nom" id="nom" value="<?= $contact['nom'] ?>">
      </div>
      <div class="form-group">
        <label for="ville">Ville : </label>
        <input type="text" class="form-control" name="ville" id="ville" value="<?= $contact['ville'] ?>">
      </div>
      <div class="form-group">
        <label for="code_postal">Code Postal : </label>
        <input type="txt" class="form-control" name="code_post" id="code_post" value="<?= $contact['code_post'] ?>">
      </div>
      <div class="form-group">
        <label for="longi">longitude : </label>
        <input type="text" class="form-control" name="longit" id="longit" value="<?= $contact['longit'] ?>">
      </div>
      <div class="form-group">
        <label for="lat">latitude : </label>
        <input type="text" class="form-control" name="lat" id="lat" value="<?= $contact['lat'] ?>">
      </div>
      <!-- <div class="form-group">
        <label for="directeur">directeur: </label>
        <input type="text" class="form-control" name="directeur" id="directeur" value="<?= $contact['directeur'] ?>">
      </div> -->
      <button type="submit" class="btn btn-info" name="modif" id="modif">Modifier</button>
      <button type="reset" class="btn btn-danger">Réinitialiser</button>
    </form>

  <?php
  }

  public static function ajoutContact()
  { ?>


    <form class="col-md-6 offset-md-3" method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <div class="form-group">
        <label for="nom">Nom : </label>
        <input type="text" class="form-control" name="nom" id="nom">
      </div>
      <div class="form-group">
        <label for="prenom">ville : </label>
        <input type="text" class="form-control" name="ville" id="ville">
      </div>
      <div class="form-group">
        <label for="mail">code postal : </label>
        <input type="txt" class="form-control" name="code_post " id="code_post ">
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
        <label for="tel">directeur : </label>
        <input type="hidden" class="form-control" name="directeur" id="directeur">
      </div>
    
      <button type="submit" class="btn btn-primary" name="ajout" id="ajout">Ajouter</button>
      <button type="reset" class="btn btn-danger">Réinitialiser</button>
    </form>
<?php
  }
}
