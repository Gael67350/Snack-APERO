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
    <i class="material-icons tiny"> lens </i> <a href="#"> historique des alertes de stock </a>
  </div>
  <div class="icon-centered borderedTopBottom">
    <i class="material-icons tiny"> lens </i> <a href="<?=action("PurchasesController@initDbReinitialiser")?>"> réinitialiser la base </a>
  </div>
</div>


<h3> Historique des alertes de stocks enregistrées </h3>

<?php /* bandeau d'alerte de stock pour l'administrateur*/
      if(isset($CurrentAlert[0]))
      {
        echo "<div class=\"red\"> ";
          foreach ($CurrentAlert as $displayedLog) {
            echo"<p> Alerte datant de : ".$displayedLog->created." message Associé : ".$displayedLog->message;
          }
          echo "<p class=\"borderedConten\"></p>";
        echo "</div>";
      }
?>
<table class="striped">
  <thead>
    <tr>
      <th> message </th>
      <th> date </th>
    </tr>
  </thead>
  <tbody>
    <?php
      foreach ($logListing as $log)
      {
        echo "<tr>";
        echo "<td> ".$log->message."</td>";
        echo "<td> ".$log->created."</td>";
      }
    ?>
  </tbody>
</table>
