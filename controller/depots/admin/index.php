<?php
session_start();

if (isset($_SESSION['id']) && $_SESSION['role'] === "admin" || $_SESSION['role'] === "directeur" || $_SESSION['role'] === "superadmin") {
?>
    <!doctype html>
    <html lang="fr">
    <?php require_once "../../../view/headadmin.php"; ?>

    <body>
        <?php
        require_once "../../../view/depots/admin/ViewTemplate.php";
        require_once "../../../view/depots/admin/ViewDepot.php";
        ViewTemplate::menu();
        ViewDepot::searchdepot();
        ?>

        <div class="container list " style="width:100% ;">

            <?php
            require_once "../../../view/depots/admin/ViewDepot.php";
            require_once "../../../model/depots/admin/ModelDepot.php";
          if (isset($_GET['search'])) {
            ViewDepot::listeDepots($_GET['search']);

          }else{
                        ViewDepot::listeDepots();

          }


            ?>
        </div>
        <?php ViewTemplate::footer(); ?>
    </body>

    </html>
<?php } else {
    var_dump($_SESSION['id']);
    var_dump($_SESSION['role']);

    header('Location: connexion-user.php');
    exit;
} ?>