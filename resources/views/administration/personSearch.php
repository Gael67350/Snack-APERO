<div class="left-border">
  <div class="icon-centered">
   <i class="material-icons"> build </i> Administration du site
  </div>
  <div class="icon-centered borderedTopBottom">
   <i class="material-icons tiny"> lens </i> <a href="#"> gérer les utilisateurs </a>
  </div>
  <div class="icon-centered borderedTopBottom">
    <i class="material-icons tiny"> lens </i> <a href="<?=action("ProductsController@launchProductSearch")?>"> gérer les produits </a>
  </div>
  <div class="icon-centered borderedTopBottom">
    <i class="material-icons tiny"> lens </i> <a href="<?=action("ProductsController@displayLogs")?>"> historique des alertes de stock </a>
  </div>
  <div class="icon-centered borderedTopBottom">
    <i class="material-icons tiny"> lens </i> <a href="<?=action("PurchasesController@initDbReinitialiser")?>"> réinitialiser la base </a>
  </div>
</div>


<h3> gestion des utilisateur </h3>
<h4> choisissez les utilisateurs qu'il faudra modifier :</h4>

<div class="input-field">
    <input id="searchedText" type="text" class="validate">
    <label for="searchedText">
      <div class="iconCentered">
            <i class="material-icons tiny"> search </i> texte recherché
      </div>
      </label>

      <table class="striped">
        <thead>
          <tr>
            <th></th>
            <th>adresse mail</th>
            <th>numero de telephone</th>
          </tr>
        </thead>
        <tbody>
          <?php
            foreach($persons as $person)
            {
              echo "<tr>";
              echo "<td> <i class=\"material-icons\"> remove_circle </i> </td>";
              echo "<td> ".$person->email ." </td>";
              echo "<td> ".$person->phone ." </td>";
              echo "</tr>";
            }
          ?>
        </tbody>
      </table>

</div>
