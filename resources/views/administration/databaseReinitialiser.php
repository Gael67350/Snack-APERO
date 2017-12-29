<div class="left-border">
  <div class="icon-centered">
   <i class="material-icons"> build </i> Administration du site
  </div>
  <div class="icon-centered borderedTopBottom">
   <i class="material-icons tiny"> lens </i> <a href="<?=action("UsersController@launchPersonSearch")?>"> gérer les utilisateurs </a>
  </div>
  <div class="icon-centered borderedTopBottom">
    <i class="material-icons tiny"> lens </i> <a href="<?=action("ProductsController@launchProductSearch")?>"> gérer les produits </a>
  </div>
  <div class="icon-centered borderedTopBottom">
    <i class="material-icons tiny"> lens </i> <a href="<?=action("ProductsController@displayLogs")?>"> historique des alertes de stock </a>
  </div>
  <div class="icon-centered borderedTopBottom">
    <i class="material-icons tiny"> lens </i> <a href="#"> réinitialiser la base </a>
  </div>
</div>
<h3> réinitialiser la base de données </h3>

<div class="borderedContent">
  <p>
      En appuyant sur le bouton ci-dessous vous allez réinitialiser la totalité
      des consommations et des recharges stockées dans la base de données et ce pour tout
      les utilisateurs de la base de données.
  </p>
  <p>
     attention : Cette action est irréversible
  </p>
  <p> Les soldes actuels des différentes enfants de la base de données seront reportés sous
      la forme d'un aprovisionnement.
  </p>

  <a onClick='confirm("Etes vous sur de vouloir réinitialiser la base de données")' href="<?= action("Controller@reinit")?>" class="waves-effect waves-light btn red"> Reinitialiser la base de données</a>
</div>
