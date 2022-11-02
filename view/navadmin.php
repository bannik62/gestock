<div class="container-liquid">
  <nav class="navbar navbar-expand-lg bg-primary navbar-dark   mb-5 p-2 justify-content-around flex-wrap ">
    <a class="navbar-brand" href="#">StockOption  <i class="fa-solid fa-boxes-stacked"></i></a>
    <!-- drop user -->
    <div class=" m-2">
      <div class="collapse navbar-collapse d-flex" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Utilisateur
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="/controller/user/admin/liste.php">liste</a>
                <a class="dropdown-item" href="../admin/ajout.php">ajout</a>
              </div>
            </div>
      </div>
    </div>
    <!-- drop depot -->
    <div class=" m-2">
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dépot
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="/controller/depots/admin/index.php">liste</a>
          <a class="dropdown-item" href="../../depots/admin/ajout.php">ajout</a>
        </div>
      </div>
    </div>
    <!-- -</div>------------ -->
    <div class=" m-2">
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categorie de produits
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="/controller/catproduits/admin/index.php">liste</a>
          <a class="dropdown-item" href="../../catproduits/admin/ajout.php">ajout</a>
        </div>
      </div>
    </div>
    <!-- ------------------- -->
    <!-- <li class="nav-item">
            <a class="nav-link" href="/controller/clients/index.php">Clients</a>
          </li> -->
    <div class=" m-2">
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          produits
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="/controller/produits/admin/index.php">liste</a>
          <a class="dropdown-item" href="../../produits/admin/ajout.php">ajout</a>
        </div>
      </div>
    </div>


    <div class=" m-2">
          <a type="button" class="btn  btn-outline-dark" href="../deconnexion.php">deconnexion &nbsp<i class="fa-solid fa-xmark "></i></a>
        </li>
      </ol>
    </div>
</div>
</nav>
</div>