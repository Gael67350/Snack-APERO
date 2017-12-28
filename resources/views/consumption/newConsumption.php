<div class="left-border">
  <div class="icon-centered">
   <i class="material-icons"> person </i> gestion des consommations de <?=$managed->name?> <?=$managed->lastName?>
  </div>
  <div class="icon-centered borderedTopBottom">
   <i class="material-icons tiny"> lens </i> <a href= "#" > insérer une nouvelle consommation </a>
  </div>
   <div class="icon-centered borderedTopBottom">
    <i class="material-icons tiny"> lens </i> <a href= <?= action("ConsumptionsController@showExistingConsumption" , ['id' => $_GET['id']]) ?> >Supresion d'une consommation existante </a>
  </div>
    <div class="icon-centered borderedTopBottom">
     <i class="material-icons tiny"> lens </i> <a href= <?=action("InflowsController@openInflows" , ['id' => $_GET['id']]) ?> > approvisionner le compte </a>
   </div>
</div>

<h5>Nouvelle consommation pour </h5>
<h5> <?=$managed->name?> <?=$managed->lastName?> </h5>

<p> Contenu de la consommation </p>

<form class="" action="index.html" method="post">
  <table class='striped'>
    <thead>
      <tr>
        <th></th>
        <th>produit</th>
        <th>prix unitaire</th>
        <th>quantité</th>
        <th>prix total</th>
      </tr>
    </thead>

    <tbody>
        <tr>
          <td>
              <i class="material-icons"> remove_circle </i>
          </td>
          <td>
            <select class="browser-default" name="productPicker">
              <option value="" disabled selected> selectionnez un produit </option>
              <optgroup label="Produits Simples">
              <?php
              foreach ($productUncomposed as $product)
                {
                  echo "<option value=\"".$product->name."\">$product->name</option>";
                }
              ?>
              </optgroup>
              <optgroup label="Produits composés">
              <?php
                foreach ($productComposed as $product)
                {
                  echo "<option value=\"".$product->name."\">$product->name</option>";
                }
              ?>
              </optgroup>
            </select>
          </td>
          <td>
            xxxxxxxxx
          </td>
          <td>
            <input type="number" name="qqtprodx" value="" min="0" class="smallPicker">
          </td>
          <td>
            xxxxxxxxx
          </td>
        </tr>
      </tbody>
    </table>
    <p> Prix total de la consommation xx.xx€ </p>
    <button class="waves-effect waves-light btn btn-spaced" name="button"> Valider la consommation </button>
</form>
