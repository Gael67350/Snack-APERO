<div class="left-border">
  <div class="icon-centered">
    <i class="material-icons"> inbox </i> gestion du stock
  </div>
  <div class="icon-centered borderedTopBottom">
    <i class="material-icons tiny"> lens </i> consulter les stocks des produits
  </div>
  <div class="icon-centered borderedTopBottom">
    <i class="material-icons tiny"> lens </i> enregistre un achat
  </div>
  <div class="icon-centered borderedTopBottom">
    <i class="material-icons tiny"> lens </i> hystorique des achats
  </div>
</div>

<h5> Historique des achats enregistrés</h5>

<table class="striped">
  <thead>
    <th> </th>
    <th> date </th>
    <th> prix </th>
    <th> contenu </th>
  </thead>
  <tbody>
      <?php
        use App\Models;
        foreach ($purchases as $purchase)
        {
          echo'<tr>';
            if($purchase->transactionDate == date("jj-mm-aaaa hh:mm:ss"))
            {
              echo "<td> <i class=\"material-icons\"> remove_circle </i> </td>";
            }
            else
            {
              echo "<td></td>";
            }
            echo "<td>".$purchase->transactionDate."</td>";
            echo "<td>".$purchase->totalPrice."€ </td>";

            echo"<td>";
            echo"<table class=\"bordered\">";
            echo"   <thead>";
            echo"     <tr>";
            echo"      <td>produit</td>";
            echo"      <td>quantité</td>";
            echo"    </tr>";
            echo"  </thead>";
            echo"  <tbody>";
            foreach (Models\Purchase::getAssociatedPurchases($purchase->id_purchase) as $product)
            {
              echo"<tr>";
              echo"<td>".Models\Product::find($product->id_product)->name."</td>";
              echo"<td>".$product->quantity."</td>";
              echo"</tr>";
            }
            echo"  </tbody>";
            echo"</table>";
            echo"</td>";

          echo'</tr>';
        }

      ?>
    <tbody>
</table>
