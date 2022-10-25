<?php
require_once "../../model/produits/ModelContact.php";

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
        echo "aucun contact n'a été trouvé dans la liste.";
      }
      ?>
    </div>
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
            <h5 class="card-title"><?= $contact['id'] . " : " . $contact['nom'] . " " . $contact['type'];  ?> </h5>

            <p class="card-text">
              photo : <a href="photo:<?= $contact['photo'] ?>" target="_blank"><?= $contact['photo'] ?></a><br>
              description : <a href="description:<?= $contact['description'] ?>" target="_blank"><?= $contact['description'] ?></a>
            </p>
            <a href="modif.php?id=<?= $contact['id'] ?>" class="btn btn-info">Modifier</a>
            <a href="supp.php?id=<?= $contact['id'] ?>" class="btn btn-danger">Supprimer</a><br><br>
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
        <label for="type">type : </label>
        <input type="text" class="form-control" name="type" id="type" value="<?= $contact['type'] ?>">
      </div>
      <div class="form-group">
        <label for="photo">Adresse photo : </label>
        <input type="ephoto" class="form-control" name="photo" id="photo" value="<?= $contact['photo'] ?>">
      </div>
      <div class="form-group">
        <label for="description">téléphone : </label>
        <input type="description" class="form-control" name="description" id="description" value="<?= $contact['description'] ?>">
      </div>

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
        <label for="type">type : </label>
        <input type="text" class="form-control" name="type" id="type">
      </div>
      <div class="form-group">
        <label for="photo">Adresse photo : </label>
        <input type="ephoto" class="form-control" name="photo" id="photo">
      </div>
      <div class="form-group">
        <label for="description">téléphone : </label>
        <input type="description" class="form-control" name="description" id="description">
      </div>

      <button type="submit" class="btn btn-primary" name="ajout" id="ajout">Ajouter</button>
      <button type="reset" class="btn btn-danger">Réinitialiser</button>
    </form>

<?php
  }
}
