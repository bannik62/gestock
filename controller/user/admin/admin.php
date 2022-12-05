<?php
session_start();

if (isset($_SESSION['id']) && ($_SESSION['role'] === "superadmin") ||  ($_SESSION['role'] === "admin" || $_SESSION['role'] === "directeur")) {

} else {
  var_dump($_SESSION['id']);
  var_dump($_SESSION['role']);
  header('Location: connexion-user.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<body>
  <?php include_once "../../../view/headadmin.php" ?>
  <?php include_once "../../../view/navadmin.php" ?>
  <?php include_once "../../../view/user/admin/ViewTemplate.php" ?>

  <div class="m-2 ">
    <p class="text-center m-1 h1"><u> Application de Gestion des Stocks et Clients </u></p>
    <br>
    <p class="text-center m-1 h1">Role hierarchique: <?= $_SESSION['role']?></p>
  </div>
  <div class=" text-wrap text-bg-info bg-opacity-25 overflow-scroll mx-auto mb-3 rounded-start  my-5 p-3 border-2 border-start border-primary border-top    " style="height:400px ; width:800px;width:700px ">
    <p class=" p-3">
      application gestion de stock
      La gestion des stocks est une fonction essentielle pour toute entreprise. Les entreprises gardent une trace de leurs articles en stock pour éviter de gaspiller des ressources et pour planifier la production. Ils gèrent également leurs niveaux de stocks pour maximiser les profits. Dans cet article, vous apprendrez comment les entreprises gèrent leurs stocks et comment les techniques de gestion des stocks affectent le succès d'une entreprise.
      La gestion des stocks implique de prendre des décisions sur le nombre d'articles à produire et où les produire. Les stratégies de gestion des stocks incluent les coûts directs de main-d'œuvre, de matériel, d'espace et de transport ainsi que le coût de remplacement des articles usés. La stratégie de gestion des stocks d'une entreprise détermine le nombre d'articles dont elle dispose à un moment donné. Par exemple, si la stratégie de gestion choisit la main-d'œuvre directe comme base pondérée par les coûts, une entreprise avec un niveau de stock élevé aurait une marge bénéficiaire inférieure à celle avec des niveaux de stock inférieurs.
      La gestion des stocks implique le suivi des articles en stock tels que les produits manufacturés, les matières premières et les pièces. Chaque article a un code ou un nom qui permet aux gestionnaires d'identifier et de suivre les articles en stock. Le processus de suivi des stocks est appelé gestion des stocks ; ce terme fait également référence à la personne qui fait ce travail. En outre, le conseil d'administration d'une entreprise supervise le processus de gestion des stocks et définit les politiques générales de gestion de ses niveaux de stocks.
      Pour maintenir un avantage concurrentiel, les entreprises utilisent un large éventail de techniques pour maintenir leurs niveaux de stocks à des niveaux optimaux. Certaines méthodes courantes incluent les suivantes :
      <br><br>
      1) Planification de la production - Les entreprises établissent des plans de production en fonction de leurs niveaux de stocks actuels et des conditions du marché. S'ils ont plus de produits prêts à vendre qu'ils n'ont de place pour stocker, ils doivent réduire le nombre d'articles qu'ils prévoient de fabriquer. Sinon, ils manqueront d'espace pour stocker leurs produits sans gagner d'argent en les vendant. D'un autre côté, s'ils ont moins d'espace disponible que prévu, ils doivent produire plus de biens que nécessaire pour couvrir leurs coûts et faire un peu de profit.
      <br> 2) Stockage - Les articles sont stockés dans différentes zones des usines ou des entrepôts en fonction de l'endroit où ils sont les plus rentables à vendre. Les articles très demandés sont stockés dans de meilleures conditions tandis que les articles moins populaires sont stockés dans des conditions de moindre qualité. Des zones de stockage de meilleure qualité réduisent la fréquence des dysfonctionnements de l'équipement et garantissent que les produits restent en bon état longtemps après que leur qualité marchande d'origine a été perdue en raison de l'utilisation ou de l'âge. Les zones de stockage de mauvaise qualité permettent aux fabricants de jeter des matériaux moins chers tels que le papier de construction lors de la production de biens pour des marchés à faible profit tels que les ventes au détail ou les promotions auprès des consommateurs. Cette pratique permet aux fabricants de réduire les prix de détail sans répercuter ces économies sur les consommateurs par le biais de prix plus bas - permettant aux consommateurs qui peuvent le moins se permettre des réductions de prix d'acheter des produits plus chers avec l'argent des contribuables grâce à des programmes d'aide sociale tels que des coupons d'aide sociale et des coupons alimentaires pour lesquels les détaillants paient des subventions via les exigences en matière de taxe de vente sur les codes fiscaux des États de consommation (ne laissant aux consommateurs d'autre choix que les subventions gouvernementales) .
      <br> 3) Rotation des stocks - Les articles en stock sont périodiquement alternés entre les points de vente à volume élevé afin que les fabricants puissent continuellement augmenter leur volume de ventes tout en maintenant des conditions de stockage optimales pour leurs produits. Les produits qui changent couramment d'emplacement entre les zones de stockage comprennent les ampoules, les limons d'ampoules (courtiers), les lampes et autres luminaires tels que les limons d'ampoules de lampe tournent des points de vente à volume élevé tels que les magasins de rénovation domiciliaire, les quincailleries et les détaillants à prix réduits vers les bas- des entrepôts de volume pour les consommateurs qui veulent des prix bas mais qui ne veulent pas s'embêter eux-mêmes avec des travaux complexes d'assemblage de luminaires .
      <br> Le succès d'une entreprise dépend de stratégies efficaces de gestion des stocks qui maximisent les profits tout en minimisant le gaspillage et en maintenant des niveaux de stock optimaux pour les produits vendables. Pour maintenir la continuité des activités, les membres du personnel doivent être bien formés dans tous les aspects de la gestion des stocks afin de pouvoir gérer efficacement les stocks de votre entreprise .
    </p>

  </div>
  <?php ViewTemplate::footer();
  ?>
  <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>
  <script src="http://cdn.jsdelivr.net/jquery.validation/1.14.0/jquery.validate.min.js"></script>
</body>

</html>