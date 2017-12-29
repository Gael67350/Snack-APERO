<div class="left-border">
  <div class="icon-centered">
    <i class="material-icons"> inbox </i> gestion du stock
  </div>
  <div class="icon-centered borderedTopBottom">
    <i class="material-icons tiny"> lens </i> <a href="<?=action("ProductsController@displayStocks")?>">consulter les stocks des produits </a>
  </div>
  <div class="icon-centered borderedTopBottom">
    <i class="material-icons tiny"> lens </i> <a href="#"> enregistre un achat </a>
  </div>
  <div class="icon-centered borderedTopBottom">
    <i class="material-icons tiny"> lens </i> <a href="<?=action("ProductsController@buyHistory")?>"> historique des achats </a>
  </div>
</div>



<h5> Achat de produit </h5>

<form class="" action="index.html" method="post">
  <label for="dateInput"> Date d'achat </label>
  <input type="date" name="dateInput" value="">
  <label for="priceInput"> Prix total de l'achat </label>
  <input type="number" name="" value="00.00" min="0" step="0.01">

  <table class="striped">
    <thead>
      <tr>
        <th></th>
        <th> produit </th>
        <th> quantité </th>
      </tr>
    </thead>
    <tbody id='dynamic-rows-table'>
  	<tr class="dynamic-row">
  		<td><i class="material-icons"> remove_circle </i></td>
  		<td>
  			<select class="browser-default" name="productPicker">
  				<option value="" disabled selected>Sélectionnez un produit</option>
                      <?php foreach ($productUncomposed as $product): ?>
  						<option value="<?= $product->id_product ?>"><?= $product->name ?></option>
                      <?php endforeach; ?>
  				</optgroup>
  			</select>
  		</td>
  		<td><?= Form::number('qqtprodx', 1, ['min' => 1, 'class' => 'smallPicker']) ?></td>
  	</tr>
  	</tbody>
  </table>

  <button value="" class="waves-effect waves-light btn btn-spaced"> Valider L'insertion </button>

</form>

<script type="text/javascript" src="<?= asset('/js/buyInsert.js') ?>"></script>
