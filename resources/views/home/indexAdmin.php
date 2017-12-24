<div class="table-section">
    <ul class="collapsible" data-collapsible="accordion">
      <li>
        <div class="collapsible-header">
          <i class="material-icons">
            list
          </i>
          Aperçu de la liste des enfants
        </div>
        <div class="collapsible-body">
        <table class="striped">
          <thead>
            <tr>
              <th> Nom </th>
              <th> Prenom </th>
              <th> Solde </th>
            </tr>
          </thead>
          <tbody>
            <?php
              use App\Models;
                  foreach ($childs as $person)
                  {
                    echo '<tr>';
                    echo '<td>'.$person->lastName.'</td>';
                    echo '<td>'.$person->name.'</td>';
                      echo '<td>'.Models\Child::getBalance($person->id_child)[0]->balance.'</td>';
                    echo '</tr>';
                  }
            ?>
          </tbody>
        </table>
      </li>

      <li>
        <div class="collapsible-header">
          <i class="material-icons">
            list
          </i>
          Aperçu du stock
        </div>
        <div class="collapsible-body">
        <table class="striped">
          <thead>
            <tr>
              <th> produit </th>
              <th> quantité en stock </th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($products as $product)
              {
                if(isset($product->minQuantity))
                {
                    echo '<tr>';
                    echo '<td>'.$product->name.'</td>';
                    echo '<td>'.Models\Product::getStockById($product->id_product)[0]->quantity_available.'</td>';
                    echo '</tr>';
                }
              }
            ?>
          </tbody>
        </table>
      </li>
      <ul>
    </ul>
  </div>
</div>
