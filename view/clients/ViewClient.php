<?php
require_once "../../model/clients/ModelClient.php";

class ViewClient
{
  public  static function listeClient()
  {
    $liste = ModelClient::listeClient();
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
                <th scope="row">
                  <?= $valeur['id'] ?></th>
                <td><?= $valeur['nom']?></td>
                <td><?= $valeur['prenom']?></td>
                <td><?= $valeur['mail']?></td>
                <td><?= $valeur['tel']?></td>
                <td>
                  <a href="voir.php?id=<?= $valeur['id'] ?>" class="btn-sm btn-primary">Voir</a>
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
        echo "aucun Client n'a été trouvé dans la liste.";
      }
      ?>
    </div>
    <?php
  }

  public static function voirClient($id)
  {
    $Client =  ModelClient::voirClient($id);
    // j'ai trouvé le Client
    if ($Client) {
    ?>
      <div>
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title"><?= $Client['id'] . " : " . $Client['nom'] . " " . $Client['prenom'];  ?> </h5>

            <p class="card-text">
              Mail : <a href="mailto:<?= $Client['mail'] ?>" target="_blank"><?= $Client['mail'] ?></a><br>
              Tel : <a href="tel:<?= $Client['tel'] ?>" target="_blank"><?= $Client['tel'] ?></a>
            </p>
            <a href="modif.php?id=<?= $Client['id'] ?>" class="btn btn-info">Modifier</a>
            <a href="supp.php?id=<?= $Client['id'] ?>" class="btn btn-danger">Supprimer</a><br><br>
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
      <h1>aucun Client trouvé</h1>
    <?php
    }
  }

  public static function modifClient($id)
  {
    $Client = ModelClient::voirClient($id);
    ?>
    <form class="col-md-6 offset-md-3" method="post" action="modif.php">
      <input type="hidden" class="form-control" name="id" id="id" value="<?= $Client['id'] ?>">
      <div class="form-group">
        <label for="nom">Nom : </label>
        <input type="text" class="form-control" name="nom" id="nom" value="<?= $Client['nom'] ?>">
      </div>
      <div class="form-group">
        <label for="prenom">Prenom : </label>
        <input type="text" class="form-control" name="prenom" id="prenom" value="<?= $Client['prenom'] ?>">
      </div>
      <div class="form-group">
        <label for="mail">Adresse mail : </label>
        <input type="email" class="form-control" name="mail" id="mail" value="<?= $Client['mail'] ?>">
      </div>
      <div class="form-group">
        <label for="tel">téléphone : </label>
        <input type="tel" class="form-control" name="tel" id="tel" value="<?= $Client['tel'] ?>">
      </div>

      <button type="submit" class="btn btn-info" name="modif" id="modif">Modifier</button>
      <button type="reset" class="btn btn-danger">Réinitialiser</button>
    </form>

  <?php
  }

  public static function ajoutClient()
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
