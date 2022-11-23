
<!doctype html>
<html lang="fr">
<?php
session_start();
require_once "../../../view/headadmin.php"; ?>
<body>
    <?php
    require_once "../../../view/produits/admin/ViewTemplate.php";
    ViewTemplate::menu();
    ?>

    <div class="container list " style="width:100% ;">

        <?php
        
        require_once "../../../view/depots/admin/ViewDepot.php";
        require_once "../../../model/depots/admin/ModelDepot.php";


        ViewDepot::listeDepots2($_GET['id']);

        ?>
    </div>
    <?php ViewTemplate::footer();?>
</body>

</html>