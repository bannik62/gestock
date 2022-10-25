<?php
require_once "../../model/clients/ModelContact.php";

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
              <th scope="col">Prénom</th>
              <th scope="col">Mail</th>
              <th scope="col">tel</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>

            <?php


            foreach ($liste  as $colonne => $valeur) {
            ?>
              <tr>
                <th scope="row"><?= $valeur['id'] ?></th>
                <td><?= $valeur['nom'] ?></td>
                <td><?= $valeur['prenom'] ?></td>
                <td><?= $valeur['mail'] ?></td>
                <td><?= $valeur['tel'] ?></td>
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
    <div>
      <a class="btn btn-info ms-5" href="javascript:history.go(-1)">Retour interface admin</a>
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
            <h5 class="card-title"><?= $contact['id'] . " : " . $contact['nom'] . " " . $contact['prenom'];  ?> </h5>

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
        <label for="prenom">Prenom : </label>
        <input type="text" class="form-control" name="prenom" id="prenom" value="<?= $contact['prenom'] ?>">
      </div>
      <div class="form-group">
        <label for="mail">Adresse mail : </label>
        <input type="email" class="form-control" name="mail" id="mail" value="<?= $contact['mail'] ?>">
      </div>
      <div class="form-group">
        <label for="tel">téléphone : </label>
        <input type="tel" class="form-control" name="tel" id="tel" value="<?= $contact['tel'] ?>">
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
