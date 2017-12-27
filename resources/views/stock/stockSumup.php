<div class="left-border">
  <div class="icon-centered">
    <i class="material-icons"> inbox </i> gestion du stock
  </div>
  <div class="icon-centered borderedTopBottom">
    <i class="material-icons tiny"> lens </i> <a href="#">consulter les stocks des produits </a>
  </div>
  <div class="icon-centered borderedTopBottom">
    <i class="material-icons tiny"> lens </i> <a href="<?=action("ProductsController@recordBuy")?>"> enregistre un achat </a>
  </div>
  <div class="icon-centered borderedTopBottom">
    <i class="material-icons tiny"> lens </i> <a href="<?=action("ProductsController@buyHistory")?>"> historique des achats </a>
  </div>
</div>


<h5> Apercu du stock </h5>

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
      <th>produit</th>
      <th>quantité actuellement en stock</th>
    </tr>
  </thead>
  <tbody>
    <?php
      foreach ($products as $product)
      {
        if(!empty($product->getStock()))
        {
          echo"<tr>";
          echo"<td>".$product->name."</td>";
          echo"<td>".$product->getStock()."</td>";
          echo"</tr>";
        }
      }
     ?>
  </tbody>
</table>
